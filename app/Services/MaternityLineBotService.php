<?php

namespace App\Services;

use App\Models\LogLineMessage;
use App\Models\MstMaternity;
use App\Models\MstMaternityUser;
use App\Models\TblPatient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use LINE\LINEBot;
use LINE\LINEBot\Constant\Flex\ComponentButtonHeight;
use LINE\LINEBot\Constant\Flex\ComponentButtonStyle;
use LINE\LINEBot\Constant\Flex\ComponentFontSize;
use LINE\LINEBot\Constant\Flex\ComponentLayout;
use LINE\LINEBot\Constant\Flex\ComponentMargin;
use LINE\LINEBot\Constant\Flex\ContainerDirection;
use LINE\LINEBot\Constant\Flex\ComponentSpacing;
use LINE\LINEBot\Constant\Flex\ComponentAlign;
use LINE\LINEBot\Constant\Flex\ComponentFontWeight;


use LINE\LINEBot\HTTPClient;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder;
use LINE\LINEBot\MessageBuilder\Flex\BlockStyleBuilder;
use LINE\LINEBot\MessageBuilder\Flex\BubbleStylesBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\BoxComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\ButtonComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\TextComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\SeparatorComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ContainerBuilder\BubbleContainerBuilder;
use LINE\LINEBot\MessageBuilder\FlexMessageBuilder;
use LINE\LINEBot\MessageBuilder\RawMessageBuilder;

use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\RichMenuBuilder;
use LINE\LINEBot\RichMenuBuilder\RichMenuAreaBoundsBuilder;
use LINE\LINEBot\RichMenuBuilder\RichMenuAreaBuilder;
use LINE\LINEBot\RichMenuBuilder\RichMenuSizeBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;


class MaternityLineBotService extends LINEBot
{
    /** @var string */
    private $channelSecret;
    /** @var HTTPClient */
    private $httpClient;

    private $mst_maternity;

    public function __construct(MstMaternity $mst_maternity)
    {
        $httpClient = new CurlHTTPClient($mst_maternity->line_message_channel_token);
        $args = ['channelSecret' => $mst_maternity->line_message_channel_secret];
        parent::__construct($httpClient, $args);
        $this->httpClient = $httpClient;
        $this->channelSecret = $args['channelSecret'];
        $this->mst_maternity = $mst_maternity;
    }

    public function pushMessage($to, MessageBuilder $messageBuilder, $model = null)
    {
        $log_line_message = new LogLineMessage;

        if ($model instanceof TblPatient) {
            $log_line_message->type = 1;
            $log_line_message->tbl_patient_id = $model->tbl_patient_id;
            $log_line_message->line_user_id = $model->line_user_id;
            $log_line_message->message = json_encode($messageBuilder->buildMessage());
            $log_line_message->save();
        } elseif ($model instanceof MstMaternityUser) {
            $log_line_message->type = 2;
            $log_line_message->mst_maternity_user_id = $model->mst_maternity_user_id;
            $log_line_message->line_user_id = $model->line_user_id;
            $log_line_message->message = json_encode($messageBuilder->buildMessage());
            $log_line_message->save();
        }

        $res = parent::pushMessage($to, $messageBuilder);
        return $res;
    }

    // 例：送信されたメッセージを取得するAPI
    public function getMessageContent($messageId)
    {
        return $this->httpClient->get('https://api-data.line.me/v2/bot/message/' . urlencode($messageId) . '/content');
    }

    // 例：LINEのグループ情報を取得するためのAPI
    public function getGroupSummary($groupId)
    {
        return $this->httpClient->get('https://api.line.me/v2/bot/group/' . urlencode($groupId) . '/summary');
    }

    public function follow($line_user_id)
    {
        $tbl_patient = new TblPatient;
        $code = '';
        $m = null;

        DB::beginTransaction();
        try {
            while (true) {
                $code = substr(str_shuffle('123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ'), 0, 8);
                $m = TblPatient::withTrashed()->where('code', $code)->first();
                if ($m) {
                    //コードの重複
                    continue;
                }
                break;
            }

            $profile = $this->getProfile($line_user_id)->getJSONDecodedBody();

            $tbl_patient->mst_maternity_id = $this->mst_maternity->mst_maternity_id;
            $tbl_patient->code = $code;
            $tbl_patient->line_name = $profile['displayName'];
            $tbl_patient->line_user_id = $line_user_id;
            $tbl_patient->line_picture_url = $profile['pictureUrl'];
            $tbl_patient->review_point = $this->mst_maternity->review_point;


            $tbl_patient->save();

            //リッチメニューIDを紐づける対応が必要

            $this->pushMessage($line_user_id, new TextMessageBuilder("フォローを確認\nリッチメニューに付けるBSのリンク\n" . config('app.url') . '/' . $code . '?openExternalBrowser=1'), $tbl_patient);
            $this->makeFirstRichMenu($tbl_patient);
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            Log::error($e);
        }
    }

    public function unfollow($line_user_id)
    {
        $tbl_patients = TblPatient::where('line_user_id', $line_user_id)->get();
        foreach ($tbl_patients as $tbl_patient_key => $tbl_patient) {
            $this->deleteRichMenu($tbl_patient->richmenu_id);
            $tbl_patient->richmenu_id = null;
            $tbl_patient->save();
            $tbl_patient->delete();
        }
    }

    public function sendReviewNotification(TblPatient $tbl_patient)
    {
        //ユーザーに送る処理
        //指定評価以上だった場合のメッセージ
        if ($tbl_patient->average_score >= $tbl_patient->mst_maternity->minimum_review_score) {
            //googleの口コミをプッシュする
            $this->pushMessage($tbl_patient->line_user_id, new TextMessageBuilder(view('lines/review-patient-high-rating', ['tbl_patient' => $tbl_patient,])->render()), $tbl_patient);
        } else {
            //そうでなかった場合のメッセージ
            $this->pushMessage($tbl_patient->line_user_id, new TextMessageBuilder(view('lines/review-patient-low-rating', ['tbl_patient' => $tbl_patient,])->render()), $tbl_patient);
        }

        //産院スタッフに送る処理
        if ($this->mst_maternity->mst_maternity_users->count()) {
            foreach ($this->mst_maternity->mst_maternity_users as $mst_maternity_user_key => $mst_maternity_user) {
                //通知を許可しているか
                if ($mst_maternity_user->is_review_notification) {
                    //通知を受けるべき点数の場合
                    if ($tbl_patient->average_score >= $this->mst_maternity->notification_review_score) {
                        $this->pushMessage($mst_maternity_user->line_user_id, new TextMessageBuilder(view('lines/review-maternity-user', ['tbl_patient' => $tbl_patient,])->render()), $mst_maternity_user);
                    }
                }
            }
        }
    }

    public function sendStoreCompleteNotification(TblPatient $tbl_patient)
    {
        $this->pushMessage($tbl_patient->line_user_id, new TextMessageBuilder(view('lines/story-complete', ['tbl_patient' => $tbl_patient,])->render()), $tbl_patient);
    }

    /**
     * 最初のリッチメニューを作成する
     * @return void
     */
    public function makeFirstRichMenu(TblPatient $tbl_patient)
    {
        $this->deleteRichMenu($tbl_patient->richmenu_id);
        $rich_menu_builder = new RichMenuBuilder(
            RichMenuSizeBuilder::getFull(),
            true,
            $tbl_patient->line_name . 'さん(' . $tbl_patient->code . ')の初期メニュー',
            'メニューを開く',
            [
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(0, 0, 834, 843), new UriTemplateActionBuilder('産院HP', $tbl_patient->mst_maternity->official_url . '?openExternalBrowser=1')),
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(0, 844, 834, 843), new UriTemplateActionBuilder('産院インスタ', $tbl_patient->mst_maternity->instagram_url . '?openExternalBrowser=1')),
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(835, 0, 1666, 1686), new UriTemplateActionBuilder('写真提出', route('guide', $tbl_patient) . '?openExternalBrowser=1')),
            ],
        );
        try {
            $richmenu_id = $this->createRichMenu($rich_menu_builder)->getJSONDecodedBody()['richMenuId'];
        } catch (\Throwable $e) {
            return [
                'result' => false,
                'messages' => $e->getMessage(),
                'errors' => [],
            ];
        }
        $this->uploadRichMenuImage($richmenu_id, public_path('images/richmenu/first.jpg'), 'image/jpeg');
        $this->linkRichMenu($tbl_patient->line_user_id, $richmenu_id);

        $tbl_patient->richmenu_id = $richmenu_id;
        $tbl_patient->save();
    }

    /**
     * 写真提出後、レビューが無い場合のリッチメニュー
     * @return void
     */
    public function makeStorySubmittedRichMenu(TblPatient $tbl_patient)
    {
        $this->deleteRichMenu($tbl_patient->richmenu_id);
    }

    /**
     * 写真提出後、レビューが有り、高評価の場合のリッチメニュー
     * @return void
     */
    public function makeStorySubmittedHighScoreReviewRichMenu(TblPatient $tbl_patient)
    {
        $this->deleteRichMenu($tbl_patient->richmenu_id);
        $rich_menu_builder = new RichMenuBuilder(
            RichMenuSizeBuilder::getFull(),
            true,
            $tbl_patient->line_name . 'さん(' . $tbl_patient->code . ')の写真提出後、レビューが有り、高評価メニュー',
            'メニューを開く',
            [
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(0, 0, 834, 843), new UriTemplateActionBuilder('産院HP', $tbl_patient->mst_maternity->official_url . '?openExternalBrowser=1')),
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(0, 844, 834, 843), new UriTemplateActionBuilder('産院インスタ', $tbl_patient->mst_maternity->instagram_url . '?openExternalBrowser=1')),
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(835, 0, 1666, 843), new UriTemplateActionBuilder('写真提出', route('guide', $tbl_patient) . '?openExternalBrowser=1')),
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(835, 844, 1666, 843), new UriTemplateActionBuilder('口コミへのリンク', $tbl_patient->mst_maternity->review_link . '&openExternalBrowser=1')),
            ],
        );
        try {
            $richmenu_id = $this->createRichMenu($rich_menu_builder)->getJSONDecodedBody()['richMenuId'];
        } catch (\Throwable $e) {
            return [
                'result' => false,
                'messages' => $e->getMessage(),
                'errors' => [],
            ];
        }
        $this->uploadRichMenuImage($richmenu_id, public_path('images/richmenu/story-submitted.jpg'), 'image/jpeg');
        $this->linkRichMenu($tbl_patient->line_user_id, $richmenu_id);

        $tbl_patient->richmenu_id = $richmenu_id;
        $tbl_patient->save();
    }

    /**
     * 写真提出後、レビューが有り、低評価の場合のリッチメニュー
     * @return void
     */
    public function makeStorySubmittedLowScoreReviewRichMenu(TblPatient $tbl_patient)
    {
        $this->deleteRichMenu($tbl_patient->richmenu_id);
    }

    /**
     * 1ヶ月健診、レビューが無い場合のリッチメニュー
     * @return void
     */
    public function makeHealthCheckRichMenu(TblPatient $tbl_patient)
    {
        $this->deleteRichMenu($tbl_patient->richmenu_id);
    }

    /**
     * 1ヶ月健診、レビューが有り、高評価の場合のリッチメニュー
     * @return void
     */
    public function makeHealthCheckHighScoreReviewRichMenu(TblPatient $tbl_patient)
    {
        $this->deleteRichMenu($tbl_patient->richmenu_id);
    }

    /**
     * 1ヶ月健診、レビューが有り、低評価の場合のリッチメニュー
     * @return void
     */
    public function makeHealthCheckLowScoreReviewRichMenu(TblPatient $tbl_patient)
    {
        $this->deleteRichMenu($tbl_patient->richmenu_id);
    }

    /**
     * デフォルト(すべての手続きが終わった)のリッチメニュー
     * @return void
     */
    public function makeDefaultRichMenu(TblPatient $tbl_patient)
    {
        $this->deleteRichMenu($tbl_patient->richmenu_id);
    }

    public function uploadRichMenuImage($richMenuId, $imagePath, $contentType)
    {
        $url = sprintf('%s/v2/bot/richmenu/%s/content', 'https://api-data.line.me', urlencode($richMenuId));
        return $this->httpClient->post(
            $url, ['__file' => $imagePath, '__type' => $contentType,], ["Content-Type: $contentType"]
        );
    }

    public function test(TblPatient $tbl_patient)
    {
        $message = [
            'type' => 'flex',
            'altText' => 'This is a Flex Message',
            'contents' => [
                'type' => 'bubble',
                'size' => 'kilo',
                'direction' => 'ltr',
                'header' => [
                    'type' => 'box',
                    'layout' => 'vertical',
                    'contents' => [
                        [
                            'type' => 'text',
                            'text' => 'ありがとうございます！',
                            'size' => 'lg',
                            'margin' => 'none',
                            'weight' => 'bold',
                            'align' => 'start',
                        ],
                    ],
                    'backgroundColor' => '#99ff99',
                    'spacing' => 'xs',
                    'margin' => 'lg',
                ],
                'hero' => [
                    'type' => 'box',
                    'layout' => 'vertical',
                    'contents' => [
                        [
                            'type' => 'text',
                            'text' => 'hello, world'
                        ]
                    ]
                ],
                'body' => [
                    'type' => 'box',
                    'layout' => 'vertical',
                    'spacing' => 'md',
                    'action' => [
                        'type' => 'uri',
                        'uri' => 'https://linecorp.com'
                    ],
                    'contents' => [
                        [
                            'type' => 'text',
                            'text' => '高評価ありがとうございます！',
                            'size' => 'md',
                            'weight' => 'bold'
                        ],
                        [
                            'type' => 'separator'
                        ],
                        [
                            'type' => 'text',
                            'text' => '〇〇産婦人科の高評価レビューをお付けいただきまして誠にありがとうございます！よろしければこの内容をそのままgoogleに投稿いただけませんか？',
                            'wrap' => true,
                            'color' => '#555555',
                            'size' => 'md',
                            'weight' => 'regular',
                            'contents' => [
                                [
                                    'type' => 'span',
                                    'text' => '〇〇産婦人科の高評価レビューをお付けいただきまして誠にありがとうございます！\nよろしければこの内容をそのまま'
                                ],
                                [
                                    'type' => 'span',
                                    'text' => 'googleに投稿',
                                    'decoration' => 'underline',
                                    'weight' => 'bold'
                                ],
                                [
                                    'type' => 'span',
                                    'text' => 'いただけませんか？'
                                ]
                            ]
                        ],
                        [
                            'type' => 'text',
                            'text' => '下記のボタンから、レビューをコピーして30秒で投稿ができます。',
                            'contents' => [
                                [
                                    'type' => 'span',
                                    'text' => '下記のボタンから、'
                                ],
                                [
                                    'type' => 'span',
                                    'text' => 'レビューをコピーして30秒で投稿',
                                    'decoration' => 'underline',
                                    'weight' => 'bold'
                                ],
                                [
                                    'type' => 'span',
                                    'text' => 'ができます。'
                                ]
                            ],
                            'wrap' => true
                        ]
                    ]
                ],
                'footer' => [
                    'type' => 'box',
                    'layout' => 'vertical',
                    'contents' => [
                        [
                            'type' => 'button',
                            'style' => 'primary',
                            'color' => '#905c44',
                            'margin' => 'xs',
                            'action' => [
                                'type' => 'uri',
                                'label' => 'コピーして投稿する',
                                'uri' => 'http://linecorp.com/'
                            ],
                            'height' => 'sm'
                        ]
                    ]
                ],
                'styles' => [
                    'header' => [
                        'backgroundColor' => '#ff9999',
                        'separator' => true
                    ],
                    'hero' => [
                        'backgroundColor' => '#FF99FF'
                    ],
                    'body' => [
                        'backgroundColor' => '#eeeeff'
                    ],
                    'footer' => [
                        'backgroundColor' => '#cccccc'
                    ]
                ]
            ],
        ];
  
        dump($message);
//        $this->pushMessage($tbl_patient->line_user_id, new RawMessageBuilder($message), $tbl_patient);
//        $bubble_container_builder = new BubbleContainerBuilder(
//            ContainerDirection::LTR,
//            new BoxComponentBuilder(
//                ComponentLayout::VERTICAL,
//                [
//                    new TextComponentBuilder(
//                        'ありがとうございます！',
//                        null,
//                        ComponentMargin::NONE,
//                        ComponentFontSize::LG,
//                        ComponentAlign::START,
//                        null,
//                        null,
//                        null,
//                        ComponentFontWeight::BOLD,
//                        null,
//                        null,
//                    )
//                ],
//                null,
//                ComponentSpacing::XS,
//                ComponentFontSize::LG,
//                null
//            ),
//            new BoxComponentBuilder(
//                ComponentLayout::VERTICAL,
//                [
//                    new TextComponentBuilder('hello, world')
//                ]
//            ),
//            new BoxComponentBuilder(
//                ComponentLayout::VERTICAL,
//                [
//                    new TextComponentBuilder(
//                        '高評価ありがとうございます！',
//                        null, 
//                        null,
//                        ComponentFontSize::MD,
//                        null,
//                        null,
//                        null,
//                        null,
//                        ComponentFontWeight::BOLD
//                    ),
//                    new SeparatorComponentBuilder(),
//                    new TextComponentBuilder(
//                        '〇〇産婦人科の高評価レビューをお付けいただきまして誠にありがとうございます！よろしければこの内容をそのままgoogleに投稿いただけませんか？',
//                        null,
//                        null,
//                        ComponentFontSize::MD,
//                        ComponentAlign::START,
//                        null,
//                        true,
//                        null,
//                        ComponentFontWeight::REGULAR,
//                        '#555555',
//                        null,
//                    )
//                ]
//            ),
//            new BoxComponentBuilder(
//                ComponentLayout::VERTICAL,
//                [
//                    new ButtonComponentBuilder(
//                        new UriTemplateActionBuilder('ラベル', 'https://yahoo.co.jp'),
//                        null,
//                        ComponentMargin::XS,
//                        ComponentButtonHeight::SM,
//                        ComponentButtonStyle::PRIMARY,
//                        '#905c44'
//                    )
//                ]
//            ),
//            new BubbleStylesBuilder(
//                new BlockStyleBuilder('#ff9999'),
//                new BlockStyleBuilder('#FF99FF'),
//                new BlockStyleBuilder('#eeeeff'),
//                new BlockStyleBuilder('#cccccc'),
//            ),
//        );
//        $flex_message_builder = new FlexMessageBuilder('反響が来ました！', $bubble_container_builder);
//
//        dump($bubble_container_builder->build());
//        dump($flex_message_builder->buildMessage());

    }
}

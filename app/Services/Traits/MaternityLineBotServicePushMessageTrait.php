<?php

namespace App\Services\Traits;

use App\Models\TblPatient;
use App\Models\MstMaternityUser;
use LINE\LINEBot\MessageBuilder\RawMessageBuilder;
use LINE\LINEBot\RichMenuBuilder;
use LINE\LINEBot\RichMenuBuilder\RichMenuAreaBoundsBuilder;
use LINE\LINEBot\RichMenuBuilder\RichMenuAreaBuilder;
use LINE\LINEBot\RichMenuBuilder\RichMenuSizeBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;


trait MaternityLineBotServicePushMessageTrait
{
    public function pushMessageFollow(TblPatient $tbl_patient){
        $message = [
            'type' => 'flex', 'altText' => 'ご出産おめでとうございます！',
            'contents' =>[
                'type' => 'bubble','size' => 'kilo','direction' => 'ltr',
                'body' => [
                    'type' => 'box','layout' => 'vertical','margin' => 'none','spacing' => 'none',
                    'contents' => [
                        ['type' => 'text','text' => 'ご出産おめでとうございます！','weight' => 'bold','align' => 'center','wrap' => true],
                        ['type' => 'separator','color' => '#999999','margin' => 'md'],
                        ['type' => 'text','text' => $tbl_patient->mst_maternity->name.'でのご出産、おめでとうございます。','wrap' => true,'margin' => 'lg'],
                        ['type' => 'text','text' => '産院からのプレゼントで、一生に一度しかないご出産を記念した、感動する出産記念ムービーをプレゼントしております。','margin' => 'md','wrap' => true],
                        [
                            'type' => 'text','text' => '無料でお作りいただけます。','margin' => 'md','wrap' => true,
                            'contents' => [
                                ['type' => 'span','text' => '無料','weight' => 'bold','decoration' => 'underline'],
                                ['type' => 'span','text' => 'でお作りいただけます。']
                            ]
                        ],
                        ['type' => 'text','text' => '下記からお写真を提出してください。','margin' => 'md','wrap' => true],
                        [
                            'type' => 'button','style' => 'primary','color' => '#F68CA9','margin' => 'lg',
                            'action' => [
                                'type' => 'uri','label' => '写真を提出する','uri' => route('guide',$tbl_patient ). '?openExternalBrowser=1'
                            ]
                        ],
                        ['type' => 'separator','color' => '#999999','margin' => 'xxl'],
                        [
                            'type' => 'text','wrap' => true,'margin' => 'xl','size' => 'sm',
                            'text' => 'お写真の提出が完了し、簡単なアンケートをにお答えいただけますと、バースストーリーからAmazonギフト'.$tbl_patient->review_point.'ptを進呈しております。',
                            'contents' => [
                                ['type' => 'span','text' => 'お写真の提出が完了し、簡単なアンケートにお答えいただけますと、バースストーリーから'],
                                ['type' => 'span','text' => 'Amazonギフト'.$tbl_patient->review_point.'pt','color' => '#ee3333','weight' => 'bold'],
                                ['type' => 'span','text' => 'を進呈しております。']
                            ],
                        ]
                    ]
                ]
            ],
        ];
        $this->pushMessage($tbl_patient->line_user_id, new RawMessageBuilder($message), $tbl_patient);
    }

    public function pushMessageStorySubmitted(TblPatient $tbl_patient){
        $message = [
            'type' => 'flex', 'altText' => 'お写真の提出が完了しました。',
            'contents' => [
                'type' => 'bubble','size' => 'kilo','direction' => 'ltr',
                'body' => [
                    'type' => 'box','layout' => 'vertical','margin' => 'none','spacing' => 'none',
                    'contents' => [
                        ['size' => 'md','text' => 'お写真の提出が完了しました。','type' => 'text','align' => 'center','weight' => 'bold','wrap' => true],
                        ['type' => 'separator','margin' => 'md','color' => '#999999'],
                        [
                            'type' => 'box','layout' => 'vertical','margin' => 'lg',
                            'contents' => [
                                ['type' => 'text','text' => '提出のご対応ありがとうございます。一生に一度しかない'.($tbl_patient->baby_name??'赤').'ちゃんの誕生を記念ムービーとしてお作り致します。１か月健診時にお受け取りいただけるようにいたします。','wrap' => true]
                            ]
                        ]
                    ]
                ]
            ]
        ];
        $this->pushMessage($tbl_patient->line_user_id, new RawMessageBuilder($message), $tbl_patient);

        $message2 = [
            'type' => 'flex', 'altText' => 'お写真の提出が完了しました。',
            'contents' => [
                'type' => 'bubble','size' => 'kilo','direction' => 'ltr',
                'body' => [
                    'type' => 'box','layout' => 'vertical','margin' => 'none','spacing' => 'none',
                    'contents' => [
                        ['size' => 'md','text' => 'アンケートのお願い','type' => 'text','align' => 'center','weight' => 'bold','wrap' => true],
                        ['type' => 'separator','margin' => 'md','color' => '#999999'],
                        ['type' => 'text','text' => '産院さまにとってママさまのご意見はとても大切です。','wrap' => true,'margin' => 'lg'],
                        ['type' => 'text','text' => 'バースストーリーは産院さまに代わってママさんのご意見を集め、さらなる満足度の向上に努めております。','wrap' => true,'margin' => 'lg'],
                        [
                            'type' => 'box','layout' => 'vertical','margin' => 'lg',
                            'contents' => [
                                [
                                    'type' => 'text','wrap' => true,
                                    'text' => 'アンケートにお答えいただけますと、心ばかりではありますが、Amazonギフト'.$tbl_patient->review_point.'ptを進呈いたします。',
                                    'contents' => [
                                        ['type' => 'span','text' => 'アンケートにお答えいただけますと、心ばかりではありますが、'],
                                        ['type' => 'span','text' => 'Amazonギフト'.$tbl_patient->review_point.'ptを進呈','color' => '#cc3333','weight' => 'bold'],
                                        ['type' => 'span','text' => 'を進呈いたします。']
                                    ]
                                ]
                            ]
                        ]
                    ]
                ],
                'footer' => [
                    'type' => 'box','layout' => 'vertical',
                    'contents' => [
                        [
                            'type' => 'button','style' => 'primary','color' => '#F68CA9',
                            'action' => [
                                'type' => 'uri','label' => 'アンケートに答える',
                                'uri' => route('review',$tbl_patient ). '?openExternalBrowser=1'
                            ]
                        ]
                    ]
                ]
            ]
        ];
        $this->pushMessage($tbl_patient->line_user_id, new RawMessageBuilder($message2), $tbl_patient);
    }
    
    
    public function pushMessageReviewPatientHighRating(TblPatient $tbl_patient){
        $message = [
            'type' => 'flex', 'altText' => '高評価ありがとうございます！',
            'contents' => [
                'type' => 'bubble', 'size' => 'kilo', 'direction' => 'ltr',
                'body' => [
                    'type' => 'box', 'layout' => 'vertical','spacing' => 'none', 'margin' => 'none',
                    'contents' => [
                        ['type' => 'text', 'text' => '高評価ありがとうございます！', 'size' => 'md', 'weight' => 'bold', 'align' => 'center',"wrap" => true],
                        ['type' => 'separator', 'margin' => 'md'],
                        [
                            'type' => 'image',
                            //todo 下記画像URLは変える必要がある
                            'url' => 'https://dev.upload.birth-story.jp/images/line-star.png?sadf',
                            'margin' => 'lg', 'offsetTop' => '0px', 'offsetBottom' => '0px', 'offsetStart' => '0px', 'offsetEnd' => '0px',
                            'aspectRatio' => '5:1','size' => '3xl'
                        ],
                        [
                            'type' => 'text', 'text' => $tbl_patient->mst_maternity->name.'の高評価レビューをありがとうございます！よろしければこの内容をそのままgoogleに投稿いただけませんか？',
                            'wrap' => true, 'color' => '#555555', 'size' => 'md', 'weight' => 'regular','margin' => 'lg',
                            'contents' => [
                                ['type' => 'span', 'text' => $tbl_patient->mst_maternity->name."の高評価レビューをありがとうございます！\nよろしければこの内容をそのまま"],
                                ['type' => 'span', 'text' => 'googleの口コミに投稿','decoration' => 'underline', 'weight' => 'bold'],
                                ['type' => 'span', 'text' => 'いただけませんか？']
                            ],
                        ],
                        [
                            'type' => 'text',
                            'text' => '下記のボタンから、レビューをコピーして30秒で投稿ができます。',
                            'wrap' => true,
                            'contents' => [
                                ['type' => 'span', 'text' => '下記のボタンから、'],
                                ['type' => 'span','text' => 'レビューをコピーして30秒で投稿','decoration' => 'underline', 'weight' => 'bold'],
                                ['type' => 'span', 'text' => 'ができます。']
                            ],
                            
                        ]
                    ]
                ],
                'footer' => [
                    'type' => 'box', 'layout' => 'vertical','margin' => 'none', 'spacing' => 'none',
                    'contents' => [
                        [
                            'type' => 'button', 'style' => 'primary', 'color' => '#905c44', 'margin' => 'none','height' => 'md',
                            'action' => [
                                'type' => 'uri', 'label' => 'コピーして投稿する',
                                'uri' => route('guide',$tbl_patient ). '?openExternalBrowser=1'
                            ]
                        ]
                    ]
                ]
            ],
        ];

//        dump(json_encode($message));
        $this->pushMessage($tbl_patient->line_user_id, new RawMessageBuilder($message), $tbl_patient);
    }

    public function pushMessageReviewHighRatingToMaternityUser(MstMaternityUser $mst_maternity_user,TblPatient $tbl_patient){
        $message = [
            'type' => 'flex', 'altText' => '産院さまの評価をいただきました。',
            'contents' =>[
                'type' => 'bubble','size' => 'mega','direction' => 'ltr',
                'body' => [
                    'type' => 'box','layout' => 'vertical','margin' => 'none','spacing' => 'none',
                    'contents' => [
                        ['size' => 'md','text' => '産院さまの評価をいただきました。','type' => 'text','weight' => 'bold','wrap' => true],
                        ['type' => 'separator','margin' => 'md','color' => '#999999'],
                        [
                            'type' => 'box','layout' => 'vertical','margin' => 'lg',
                            'contents' => [
                                ['type' => 'text','text' => '[回答した患者さま]'],
                                ['type' => 'text','text' => '山田はなこ さま']
                            ]
                        ],
                        [
                            'type' => 'box','layout' => 'vertical','margin' => 'lg',
                            'contents' => [
                                ['type' => 'text','text' => '[総合評価]'],
                                [
                                    'type' => 'box','layout' => 'baseline',
                                    'contents' => [
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'lg'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'lg'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'lg'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'lg'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'lg'],
                                        ['type' => 'text','text' => '4.2','size' => 'md','color' => '#666666','margin' => 'md','offsetTop' => '-3px','weight' => 'bold']
                                    ]
                                ]
                            ]
                        ],
                        ['type' => 'separator','margin' => 'lg','color' => '#999999'],
                        [
                            'type' => 'box','layout' => 'vertical','margin' => 'lg',
                            'contents' => [
                                ['text' => '[1] お食事の内容はいかがでしたか？','type' => 'text','wrap' => true,'size' => 'sm'],
                                [
                                    'type' => 'box','layout' => 'baseline',
                                    'contents' => [
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['type' => 'text','text' => '4','size' => 'md','color' => '#666666','margin' => 'sm','weight' => 'bold','offsetTop' => '-1px']
                                    ]
                                ]
                            ]
                        ],
                        [
                            'type' => 'box','layout' => 'vertical','margin' => 'lg',
                            'contents' => [
                                ['text' => '[2] 健診時の看護師・助産師の対応はいかがでしたか？','type' => 'text','wrap' => true,'size' => 'sm'],
                                [
                                    'type' => 'box','layout' => 'baseline',
                                    'contents' => [
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['type' => 'text','text' => '4','size' => 'md','color' => '#666666','margin' => 'sm','weight' => 'bold','offsetTop' => '-1px']
                                    ]
                                ]
                            ]
                        ],
                        [
                            'type' => 'box','layout' => 'vertical','margin' => 'lg',
                            'contents' => [
                                ['text' => '[3] 医師の対応はいかがでしたか？','type' => 'text','wrap' => true,'size' => 'sm'],
                                [
                                    'type' => 'box','layout' => 'baseline',
                                    'contents' => [
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['type' => 'text','text' => '4','size' => 'md','color' => '#666666','margin' => 'sm','weight' => 'bold','offsetTop' => '-1px']
                                    ]
                                ]
                            ]
                        ],
                        [
                            'type' => 'box','layout' => 'vertical','margin' => 'lg',
                            'contents' => [
                                ['text' => '[4] ご出産時の看護師・助産師の対応はいかがでしたか？','type' => 'text','wrap' => true,'size' => 'sm'],
                                [
                                    'type' => 'box','layout' => 'baseline',
                                    'contents' => [
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['type' => 'text','text' => '4','size' => 'md','color' => '#666666','margin' => 'sm','weight' => 'bold','offsetTop' => '-1px']
                                    ]
                                ]
                            ]
                        ],
                        [
                            'type' => 'box','layout' => 'vertical','margin' => 'lg',
                            'contents' => [
                                ['text' => '[5] 入院時の看護師・助産師の対応はいかがでしたか？','type' => 'text','wrap' => true,'size' => 'sm'],
                                [
                                    'type' => 'box','layout' => 'baseline',
                                    'contents' => [
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['type' => 'text','text' => '4','size' => 'md','color' => '#666666','margin' => 'sm','weight' => 'bold','offsetTop' => '-1px']
                                    ]
                                ]
                            ]
                        ],
                        [
                            'type' => 'box','layout' => 'vertical','margin' => 'lg',
                            'contents' => [
                                ['text' => '[6] 受付の対応はいかがでしたか？','type' => 'text','wrap' => true,'size' => 'sm'],
                                [
                                    'type' => 'box','layout' => 'baseline',
                                    'contents' => [
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['url' => 'https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png','type' => 'icon','size' => 'sm'],
                                        ['type' => 'text','text' => '4','size' => 'md','color' => '#666666','margin' => 'sm','weight' => 'bold','offsetTop' => '-1px']
                                    ]
                                ]
                            ]
                        ],
                        [
                            'type' => 'box','layout' => 'vertical','margin' => 'lg',
                            'contents' => [
                                ['type' => 'text','text' => '[レビュー]','size' => 'sm'],
                                ['text' => '初診だと予約できないみたいでした。 産科ではなく、婦人科目的行きました。平日の午前中でしたが、めちゃくちゃ人が多くてびっくり……！ モニターに番号が出ますが、小さくて見えない（笑） 1時間ぐらい待ったかな？ 若い女医さんでしたが、ハキハキしてて好印象でした。 受付の人たちも親切である。忙しそうだったけど……！ 横の施設で子どもも見てくれるみたいなので、次から予約して使ってみたいです(´ω｀)','type' => 'text','wrap' => true,'size' => 'sm','margin' => 'sm']
                            ]
                        ]
                    ]
                ]
            ]
        ];
//        dump(json_encode($message));
        $this->pushMessage($tbl_patient->line_user_id, new RawMessageBuilder($message), $mst_maternity_user);
    }
}

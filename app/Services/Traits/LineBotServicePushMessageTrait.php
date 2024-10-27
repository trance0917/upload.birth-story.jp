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


trait LineBotServicePushMessageTrait
{


    public function pushMessageFollow(TblPatient $tbl_patient){

        $message = [
            'type' => 'flex', 'altText' => 'ご出産おめでとうございます！',
            'contents' =>[
                'type' => 'bubble','size' => 'kilo','direction' => 'ltr',
                'body' => [
                    'type' => 'box','layout' => 'vertical','margin' => 'none','spacing' => 'none',
                    'contents' => [
                        ['type' => 'text','text' =>'✨'.$tbl_patient->mst_maternity->name.'✨','wrap' => true,'margin' => 'xs'],
                        ['type' => 'text','text' => 'ご出産記念DVD「バースストーリー」','margin' => 'md','wrap' => true],
                        ['type' => 'text','text' => '❤️映像サンプルはこちら❤️','margin' => 'lg','wrap' => true],
                        ['type' => 'text','text' => 'https://www.instagram.com/p/C3kCsx5x28E/?hl=ja','margin' => 'xs','wrap' => true,
                            'action' => [
                                'type' => 'uri',
                                'label' => 'action',
                                'uri' => 'https://www.instagram.com/p/C3kCsx5x28E/?hl=ja',
                            ],
                            'color' => '#0000ee',
                            'decoration' => 'underline',
                        ],
                        ['type' => 'text','text' => '❤️デジタルニューボーンフォトのサンプルはこちら❤️','margin' => 'lg','wrap' => true],
                        ['type' => 'text','text' => 'https://www.instagram.com/birthstory.jp','margin' => 'xs','wrap' => true,
                            'action' => [
                                'type' => 'uri',
                                'label' => 'action',
                                'uri' => 'https://www.instagram.com/birthstory.jp',
                            ],
                            'color' => '#0000ee',
                            'decoration' => 'underline',
                        ],
                        ['type' => 'text','text' => 'ご出産日より10日以内にお送りください。️','margin' => 'xl','wrap' => true],
                        ['type' => 'text','text' => 'プレゼント企画もこちらのLINEから配信いたします、お楽しみに✨️','margin' => 'xl','wrap' => true],
                        [
                            'type' => 'button','style' => 'primary','color' => '#F68CA9','margin' => 'lg',
                            'action' => [
                                'type' => 'uri','label' => '写真を提出する','uri' => route('guide',$tbl_patient )
                            ]
                        ],
                    ]
                ]
            ],
        ];

//        if($tbl_patient->review_point){
//            $message['contents']['body']['contents'][] = ['type' => 'separator','color' => '#999999','margin' => 'xxl'];
//            $message['contents']['body']['contents'][] = [
//                'type' => 'text','wrap' => true,'margin' => 'xl','size' => 'sm',
//                'text' => 'お写真の提出が完了し、簡単なアンケートをにお答えいただけますと、バースストーリーからAmazonギフト'.$tbl_patient->review_point.'ptを進呈しております。',
//                'contents' => [
//                    ['type' => 'span','text' => 'お写真の提出が完了し、簡単なアンケートにお答えいただけますと、バースストーリーから'],
//                    ['type' => 'span','text' => 'Amazonギフト'.$tbl_patient->review_point.'pt','color' => '#ee3333','weight' => 'bold'],
//                    ['type' => 'span','text' => 'を進呈しております。']
//                ]
//            ];
//        }
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
                    ]
                ],
                'footer' => [
                    'type' => 'box','layout' => 'vertical',
                    'contents' => [
                        [
                            'type' => 'button','style' => 'primary','color' => '#F68CA9',
                            'action' => [
                                'type' => 'uri','label' => 'アンケートに答える',
                                'uri' => route('review',$tbl_patient )
                            ]
                        ]
                    ]
                ]
            ]
        ];
        if($tbl_patient->review_point){
            $message2['contents']['body']['contents'][] = [
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
            ];
        }
        $this->pushMessage($tbl_patient->line_user_id, new RawMessageBuilder($message2), $tbl_patient);
    }


    public function pushMessageReviewPatientHighRating(TblPatient $tbl_patient){
        $message = [
            'type' => 'flex', 'altText' => 'レビューをありがとうございます',
            'contents' => [
                'type' => 'bubble', 'size' => 'kilo', 'direction' => 'ltr',
                'body' => [
                    'type' => 'box', 'layout' => 'vertical','spacing' => 'none', 'margin' => 'none',
                    'contents' => [
                        ['type' => 'text', 'text' => 'レビューをありがとうございます', 'size' => 'md', 'weight' => 'bold', 'align' => 'start',"wrap" => true],
                        ['type' => 'separator', 'margin' => 'md'],
                        [
                            'type' => 'image',
                            'url' => asset('images/line-star.png'),
                            'margin' => 'lg', 'offsetTop' => '0px', 'offsetBottom' => '0px', 'offsetStart' => '0px', 'offsetEnd' => '0px',
                            'aspectRatio' => '5:1','size' => '3xl'
                        ],
                        [
                            'type' => 'text', 'text' => $tbl_patient->mst_maternity->name.'のレビューを提出していただき、ありがとうございます！よろしければこの内容をそのままgoogleに投稿いただけませんか？',
                            'wrap' => true, 'color' => '#555555', 'size' => 'md', 'weight' => 'regular','margin' => 'lg',
                            'contents' => [
                                ['type' => 'span', 'text' => $tbl_patient->mst_maternity->name."のレビューを提出していただき、ありがとうございます！\nよろしければこの内容をそのまま"],
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
                            'type' => 'button', 'style' => 'primary', 'color' => '#F68CA9', 'margin' => 'none','height' => 'md',
                            'action' => [
                                'type' => 'uri', 'label' => 'コピーして投稿する',
                                'uri' => route('guide',$tbl_patient )
                            ]
                        ]
                    ]
                ]
            ],
        ];

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
                                ['type' => 'text','text' => $tbl_patient->name.' さま']
                            ]
                        ],
                        [
                            'type' => 'box','layout' => 'vertical','margin' => 'lg',
                            'contents' => [
                                ['type' => 'text','text' => '[総合評価]'],
                                [
                                    'type' => 'box','layout' => 'baseline',
                                    'contents' => [
                                        ...$this->total_stars[(int)round($tbl_patient->average_score)],
                                        ['type' => 'text','text' => $tbl_patient->average_score,'size' => 'md','color' => '#666666','margin' => 'md','offsetTop' => '-3px','weight' => 'bold']
                                    ]
                                ]
                            ]
                        ],
                        ['type' => 'separator','margin' => 'lg','color' => '#999999'],

                    ]
                ]
            ]
        ];


        foreach($tbl_patient->tbl_patient_reviews AS $tbl_patient_review_key => $tbl_patient_review){
            $message['contents']['body']['contents'][] = [
                'type' => 'box','layout' => 'vertical','margin' => 'lg',
                'contents' => [
                    ['text' => '['.($tbl_patient_review_key+1).'] '.$tbl_patient_review->mst_maternity_question->question,'type' => 'text','wrap' => true,'size' => 'sm'],
                    [
                        'type' => 'box','layout' => 'baseline',
                        'contents' => [
                            ...$this->small_stars[$tbl_patient_review->score],
                            ['type' => 'text','text' => (String)$tbl_patient_review->score,'size' => 'md','color' => '#666666','margin' => 'sm','weight' => 'bold','offsetTop' => '-1px']
                        ]
                    ]
                ]
            ];

        }
        $message['contents']['body']['contents'][] = [
            'type' => 'box','layout' => 'vertical','margin' => 'lg',
            'contents' => [
                ['type' => 'text','text' => '[レビュー]','size' => 'sm'],
                ['text' => $tbl_patient->review,'type' => 'text','wrap' => true,'size' => 'sm','margin' => 'sm']
            ]
        ];

        $this->pushMessage($mst_maternity_user->line_user_id, new RawMessageBuilder($message), $mst_maternity_user);
    }
}

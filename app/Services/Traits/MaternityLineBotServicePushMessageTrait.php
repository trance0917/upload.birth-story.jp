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
    public function pushLineReviewPatientHighRating(TblPatient $tbl_patient){
        $message = [
            'type' => 'flex', 'altText' => '高評価ありがとうございます！',
            'contents' => [
                'type' => 'bubble', 'size' => 'kilo', 'direction' => 'ltr',
                'body' => [
                    'type' => 'box', 'layout' => 'vertical',
                    'contents' => [
                        ['type' => 'text', 'text' => '高評価ありがとうございます！', 'size' => 'md', 'weight' => 'bold', 'align' => 'center'],
                        ['type' => 'separator', 'margin' => 'md'],
                        [
                            'type' => 'image',
                            //todo 下記画像URLは変える必要がある
                            'url' => 'https://dev.upload.birth-story.jp/images/line-star.png?sadf',
                            'margin' => 'lg', 'offsetTop' => '0px', 'offsetBottom' => '0px', 'offsetStart' => '0px', 'offsetEnd' => '0px',
                            'aspectRatio' => '5:1',
                            'size' => '3xl'
                        ],
                        [
                            'type' => 'text', 'text' => $tbl_patient->mst_maternity->name.'の高評価レビューをありがとうございます！よろしければこの内容をそのままgoogleに投稿いただけませんか？',
                            'wrap' => true, 'color' => '#555555', 'size' => 'md', 'weight' => 'regular',
                            'contents' => [
                                [
                                    'type' => 'span', 'text' => $tbl_patient->mst_maternity->name."の高評価レビューをありがとうございます！\nよろしければこの内容をそのまま"
                                ],
                                [
                                    'type' => 'span', 'text' => 'googleの口コミに投稿',
                                    'decoration' => 'underline', 'weight' => 'bold'
                                ],
                                ['type' => 'span', 'text' => 'いただけませんか？']
                            ],
                            'margin' => 'lg'
                        ],
                        [
                            'type' => 'text',
                            'text' => '下記のボタンから、レビューをコピーして30秒で投稿ができます。',
                            'contents' => [
                                ['type' => 'span', 'text' => '下記のボタンから、'],
                                [
                                    'type' => 'span',
                                    'text' => 'レビューをコピーして30秒で投稿',
                                    'decoration' => 'underline', 'weight' => 'bold'
                                ],
                                ['type' => 'span', 'text' => 'ができます。']
                            ],
                            'wrap' => true
                        ]
                    ],
                    'spacing' => 'none', 'margin' => 'none'
                ],
                'footer' => [
                    'type' => 'box', 'layout' => 'vertical',
                    'contents' => [
                        [
                            'type' => 'button', 'style' => 'primary', 'color' => '#905c44', 'margin' => 'none',
                            'action' => [
                                'type' => 'uri', 'label' => 'コピーして投稿する',
                                'uri' => route('guide',$tbl_patient)
                            ],
                            'height' => 'md'
                        ]
                    ],
                    'margin' => 'none', 'spacing' => 'none'
                ],
                'styles' => ['footer' => ['separator' => true]]
            ],
        ];

//        dump(json_encode($message));
        $this->pushMessage($tbl_patient->line_user_id, new RawMessageBuilder($message), $tbl_patient);
    }

    public function pushLineReviewHighRatingToMaternityUser(MstMaternityUser $mst_maternity_user,TblPatient $tbl_patient){
        $message = [
            'type' => 'flex', 'altText' => '高評価ありがとうございます！',
            'contents' => [
                'type' => 'bubble', 'size' => 'kilo', 'direction' => 'ltr',
                'body' => [
                    'type' => 'box', 'layout' => 'vertical',
                    'contents' => [
                        ['type' => 'text', 'text' => '高評価ありがとうございます！', 'size' => 'md', 'weight' => 'bold', 'align' => 'center'],
                        ['type' => 'separator', 'margin' => 'md'],
                        [
                            'type' => 'image',
                            //todo 下記画像URLは変える必要がある
                            'url' => 'https://dev.upload.birth-story.jp/images/line-star.png?sadf',
                            'margin' => 'lg', 'offsetTop' => '0px', 'offsetBottom' => '0px', 'offsetStart' => '0px', 'offsetEnd' => '0px',
                            'aspectRatio' => '5:1',
                            'size' => '3xl'
                        ],
                        [
                            'type' => 'text', 'text' => $tbl_patient->mst_maternity->name.'の高評価レビューをありがとうございます！よろしければこの内容をそのままgoogleに投稿いただけませんか？',
                            'wrap' => true, 'color' => '#555555', 'size' => 'md', 'weight' => 'regular',
                            'contents' => [
                                [
                                    'type' => 'span', 'text' => $tbl_patient->mst_maternity->name."の高評価レビューをありがとうございます！\nよろしければこの内容をそのまま"
                                ],
                                [
                                    'type' => 'span', 'text' => 'googleの口コミに投稿',
                                    'decoration' => 'underline', 'weight' => 'bold'
                                ],
                                ['type' => 'span', 'text' => 'いただけませんか？']
                            ],
                            'margin' => 'lg'
                        ],
                        [
                            'type' => 'text',
                            'text' => '下記のボタンから、レビューをコピーして30秒で投稿ができます。',
                            'contents' => [
                                ['type' => 'span', 'text' => '下記のボタンから、'],
                                [
                                    'type' => 'span',
                                    'text' => 'レビューをコピーして30秒で投稿',
                                    'decoration' => 'underline', 'weight' => 'bold'
                                ],
                                ['type' => 'span', 'text' => 'ができます。']
                            ],
                            'wrap' => true
                        ]
                    ],
                    'spacing' => 'none', 'margin' => 'none'
                ],
                'footer' => [
                    'type' => 'box', 'layout' => 'vertical',
                    'contents' => [
                        [
                            'type' => 'button', 'style' => 'primary', 'color' => '#905c44', 'margin' => 'none',
                            'action' => [
                                'type' => 'uri', 'label' => 'コピーして投稿する',
                                'uri' => route('guide',$tbl_patient)
                            ],
                            'height' => 'md'
                        ]
                    ],
                    'margin' => 'none', 'spacing' => 'none'
                ],
                'styles' => ['footer' => ['separator' => true]]
            ],
        ];
//        dump(json_encode($message));
//        $this->pushMessage($tbl_patient->line_user_id, new RawMessageBuilder($message), $mst_maternity_user);
    }
}

<?php

namespace App\Services\Traits;

use App\Models\TblPatient;
use LINE\LINEBot\RichMenuBuilder;
use LINE\LINEBot\RichMenuBuilder\RichMenuAreaBoundsBuilder;
use LINE\LINEBot\RichMenuBuilder\RichMenuAreaBuilder;
use LINE\LINEBot\RichMenuBuilder\RichMenuSizeBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;


trait MaternityLineBotServiceMakeRichMenuTrait
{
    public function uploadRichMenuImage($richMenuId, $imagePath, $contentType)
    {
        $url = sprintf('%s/v2/bot/richmenu/%s/content', 'https://api-data.line.me', urlencode($richMenuId));
        return $this->httpClient->post(
            $url, ['__file' => $imagePath, '__type' => $contentType,], ["Content-Type: $contentType"]
        );
    }
    /**
     * 最初のリッチメニューを作成する
     * @return void
     */
    public function makeFirstRichMenu(TblPatient $tbl_patient)
    {
        $this->deleteRichMenu($tbl_patient->richmenu_id);
        $rich_menu_builder = new RichMenuBuilder(
            RichMenuSizeBuilder::getFull(),true,$tbl_patient->line_name . 'さん(' . $tbl_patient->code . ')の初期リッチメニュー','メニューを開く',
            [
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(0, 0, 834, 843), new UriTemplateActionBuilder('産院HP', $tbl_patient->mst_maternity->official_url)),
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(0, 844, 834, 843), new UriTemplateActionBuilder('産院インスタ', $tbl_patient->mst_maternity->instagram_url)),
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(835, 0, 1666, 1686), new UriTemplateActionBuilder('写真提出', route('guide', $tbl_patient).'?openExternalBrowser=1')),
            ],
        );
        try {
            $richmenu_id = $this->createRichMenu($rich_menu_builder)->getJSONDecodedBody()['richMenuId'];
        } catch (\Throwable $e) {
            return ['result' => false,'messages' => $e->getMessage(),'errors' => [],];
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
        $rich_menu_builder = new RichMenuBuilder(
            RichMenuSizeBuilder::getFull(),true,$tbl_patient->line_name . 'さん(' . $tbl_patient->code . ')のレビューが無い場合のリッチメニュー','メニューを開く',
            [
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(0, 0, 834, 843), new UriTemplateActionBuilder('産院HP', $tbl_patient->mst_maternity->official_url)),
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(0, 844, 834, 843), new UriTemplateActionBuilder('産院インスタ', $tbl_patient->mst_maternity->instagram_url)),
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(835, 0, 1666, 843), new UriTemplateActionBuilder('写真提出', route('guide', $tbl_patient) . '?openExternalBrowser=1')),
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(835, 844, 1666, 843), new UriTemplateActionBuilder('アンケート依頼', route('review', $tbl_patient) . '?openExternalBrowser=1')),
            ],
        );
        try {
            $richmenu_id = $this->createRichMenu($rich_menu_builder)->getJSONDecodedBody()['richMenuId'];
        } catch (\Throwable $e) {
            return ['result' => false,'messages' => $e->getMessage(),'errors' => [],];
        }
        $this->uploadRichMenuImage($richmenu_id, public_path('images/richmenu/story-submitted.jpg'), 'image/jpeg');
        $this->linkRichMenu($tbl_patient->line_user_id, $richmenu_id);

        $tbl_patient->richmenu_id = $richmenu_id;
        $tbl_patient->save();
    }

    /**
     * 写真提出後、レビューが有り、高評価の場合のリッチメニュー
     * @return void
     */
    public function makeStorySubmittedHighScoreReviewRichMenu(TblPatient $tbl_patient)
    {
        $this->deleteRichMenu($tbl_patient->richmenu_id);
        $rich_menu_builder = new RichMenuBuilder(
            RichMenuSizeBuilder::getFull(),true,$tbl_patient->line_name . 'さん(' . $tbl_patient->code . ')の写真提出後、レビューが有り、高評価リッチメニュー','メニューを開く',
            [
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(0, 0, 834, 843), new UriTemplateActionBuilder('産院HP', $tbl_patient->mst_maternity->official_url)),
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(0, 844, 834, 843), new UriTemplateActionBuilder('産院インスタ', $tbl_patient->mst_maternity->instagram_url)),
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(835, 0, 1666, 843), new UriTemplateActionBuilder('写真提出', route('guide', $tbl_patient) . '?openExternalBrowser=1')),
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(835, 844, 1666, 843), new UriTemplateActionBuilder('Google口コミへのリンク', $tbl_patient->mst_maternity->review_link)),
            ],
        );
        try {
            $richmenu_id = $this->createRichMenu($rich_menu_builder)->getJSONDecodedBody()['richMenuId'];
        } catch (\Throwable $e) {
            return ['result' => false,'messages' => $e->getMessage(),'errors' => [],];
        }
        $this->uploadRichMenuImage($richmenu_id, public_path('images/richmenu/story-submitted-high-score-review.jpg'), 'image/jpeg');
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
        $rich_menu_builder = new RichMenuBuilder(
            RichMenuSizeBuilder::getHalf(),true,$tbl_patient->line_name . 'さん(' . $tbl_patient->code . ')の写真提出後、レビューが有り、低評価リッチメニュー','メニューを開く',
            [
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(0, 0, 833, 843), new UriTemplateActionBuilder('産院HP', $tbl_patient->mst_maternity->official_url)),
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(834, 0, 834, 843), new UriTemplateActionBuilder('産院インスタ', $tbl_patient->mst_maternity->instagram_url)),
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(1667, 0, 833, 843), new UriTemplateActionBuilder('写真提出', route('guide', $tbl_patient) . '?openExternalBrowser=1')),
            ],
        );
        try {
            $richmenu_id = $this->createRichMenu($rich_menu_builder)->getJSONDecodedBody()['richMenuId'];
        } catch (\Throwable $e) {
            return ['result' => false,'messages' => $e->getMessage(),'errors' => [],];
        }
        $this->uploadRichMenuImage($richmenu_id, public_path('images/richmenu/story-submitted-low-score-review.jpg'), 'image/jpeg');
        $this->linkRichMenu($tbl_patient->line_user_id, $richmenu_id);

        $tbl_patient->richmenu_id = $richmenu_id;
        $tbl_patient->save();
    }

    /**
     * 1ヶ月健診、レビューが無い場合のリッチメニュー
     * @return void
     */
    public function makeHealthCheckRichMenu(TblPatient $tbl_patient)
    {
        $this->deleteRichMenu($tbl_patient->richmenu_id);
        $rich_menu_builder = new RichMenuBuilder(
            RichMenuSizeBuilder::getFull(),true,$tbl_patient->line_name . 'さん(' . $tbl_patient->code . ')の1ヶ月健診、レビューが無い場合のリッチメニュー','メニューを開く',
            [
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(0, 0, 834, 843), new UriTemplateActionBuilder('産院HP', $tbl_patient->mst_maternity->official_url)),
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(0, 844, 834, 843), new UriTemplateActionBuilder('産院インスタ', $tbl_patient->mst_maternity->instagram_url)),
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(835, 0, 1666, 843), new UriTemplateActionBuilder('写真提出', route('guide', $tbl_patient) . '?openExternalBrowser=1')),
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(835, 844, 1666, 843), new UriTemplateActionBuilder('アンケート依頼', route('review', $tbl_patient) . '?openExternalBrowser=1')),
            ],
        );
        try {
            $richmenu_id = $this->createRichMenu($rich_menu_builder)->getJSONDecodedBody()['richMenuId'];
        } catch (\Throwable $e) {
            return ['result' => false,'messages' => $e->getMessage(),'errors' => [],];
        }
        $this->uploadRichMenuImage($richmenu_id, public_path('images/richmenu/health-check.jpg'), 'image/jpeg');
        $this->linkRichMenu($tbl_patient->line_user_id, $richmenu_id);

        $tbl_patient->richmenu_id = $richmenu_id;
        $tbl_patient->save();
    }

    /**
     * 1ヶ月健診、レビューが有り、高評価の場合のリッチメニュー
     * @return void
     */
    public function makeHealthCheckHighScoreReviewRichMenu(TblPatient $tbl_patient)
    {
        $this->deleteRichMenu($tbl_patient->richmenu_id);
        $rich_menu_builder = new RichMenuBuilder(
            RichMenuSizeBuilder::getFull(),true,$tbl_patient->line_name . 'さん(' . $tbl_patient->code . ')の1ヶ月健診、レビューが有り、高評価の場合のリッチメニュー','メニューを開く',
            [
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(0, 0, 834, 843), new UriTemplateActionBuilder('産院HP', $tbl_patient->mst_maternity->official_url)),
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(0, 844, 834, 843), new UriTemplateActionBuilder('産院インスタ', $tbl_patient->mst_maternity->instagram_url)),
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(835, 0, 1666, 843), new UriTemplateActionBuilder('写真提出', route('guide', $tbl_patient) . '?openExternalBrowser=1')),
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(835, 844, 1666, 843), new UriTemplateActionBuilder('Google口コミへのリンク', $tbl_patient->mst_maternity->review_link)),
            ],
        );
        try {
            $richmenu_id = $this->createRichMenu($rich_menu_builder)->getJSONDecodedBody()['richMenuId'];
        } catch (\Throwable $e) {
            return ['result' => false,'messages' => $e->getMessage(),'errors' => [],];
        }
        $this->uploadRichMenuImage($richmenu_id, public_path('images/richmenu/health-check-high-score-review.jpg'), 'image/jpeg');
        $this->linkRichMenu($tbl_patient->line_user_id, $richmenu_id);

        $tbl_patient->richmenu_id = $richmenu_id;
        $tbl_patient->save();
    }

    /**
     * 1ヶ月健診、レビューが有り、低評価の場合のリッチメニュー
     * @return void
     */
    public function makeHealthCheckLowScoreReviewRichMenu(TblPatient $tbl_patient)
    {
        $this->deleteRichMenu($tbl_patient->richmenu_id);
        $rich_menu_builder = new RichMenuBuilder(
            RichMenuSizeBuilder::getHalf(),true,$tbl_patient->line_name . 'さん(' . $tbl_patient->code . ')の1ヶ月健診、レビューが有り、低評価の場合のリッチメニュー','メニューを開く',
            [
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(0, 0, 833, 843), new UriTemplateActionBuilder('産院HP', $tbl_patient->mst_maternity->official_url)),
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(834, 0, 834, 843), new UriTemplateActionBuilder('産院インスタ', $tbl_patient->mst_maternity->instagram_url)),
                new RichMenuAreaBuilder(new RichMenuAreaBoundsBuilder(1667, 0, 833, 843), new UriTemplateActionBuilder('写真提出', route('guide', $tbl_patient) . '?openExternalBrowser=1')),
            ],
        );
        try {
            $richmenu_id = $this->createRichMenu($rich_menu_builder)->getJSONDecodedBody()['richMenuId'];
        } catch (\Throwable $e) {
            return ['result' => false,'messages' => $e->getMessage(),'errors' => [],];
        }
        $this->uploadRichMenuImage($richmenu_id, public_path('images/richmenu/health-check-low-score-review.jpg'), 'image/jpeg');
        $this->linkRichMenu($tbl_patient->line_user_id, $richmenu_id);

        $tbl_patient->richmenu_id = $richmenu_id;
        $tbl_patient->save();
    }
}

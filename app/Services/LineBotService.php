<?php
namespace App\Services;

use App\Models\LogLineMessage;
use App\Models\MstMaternityUser;
use App\Models\TblLiff;
use App\Models\TblPatient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use LINE\LINEBot;
use LINE\LINEBot\MessageBuilder;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use App\Services\Traits\LineBotServiceMakeRichMenuTrait;
use App\Services\Traits\LineBotServicePushMessageTrait;

class LineBotService extends LINEBot
{
    use LineBotServiceMakeRichMenuTrait,LineBotServicePushMessageTrait;
    /** @var string */
    private $channelSecret;
    /** @var HTTPClient */
    private $httpClient;

    public $total_stars = [];
    public $small_stars = [];

    public function __construct() {
        $httpClient = new CurlHTTPClient(config('birthstory.line_message_channel_token'));
        $args = ['channelSecret' => config('birthstory.line_message_channel_secret')];
        parent::__construct($httpClient, $args);
        $this->httpClient = $httpClient;
        $this->channelSecret = $args['channelSecret'];

        $this->total_stars = [
            1 => [
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'lg'],
                ['url' => asset('images/review_gray_star.png'),'type' => 'icon','size' => 'lg'],
                ['url' => asset('images/review_gray_star.png'),'type' => 'icon','size' => 'lg'],
                ['url' => asset('images/review_gray_star.png'),'type' => 'icon','size' => 'lg'],
                ['url' => asset('images/review_gray_star.png'),'type' => 'icon','size' => 'lg'],
            ],
            2 => [
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'lg'],
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'lg'],
                ['url' => asset('images/review_gray_star.png'),'type' => 'icon','size' => 'lg'],
                ['url' => asset('images/review_gray_star.png'),'type' => 'icon','size' => 'lg'],
                ['url' => asset('images/review_gray_star.png'),'type' => 'icon','size' => 'lg'],
            ],
            3 => [
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'lg'],
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'lg'],
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'lg'],
                ['url' => asset('images/review_gray_star.png'),'type' => 'icon','size' => 'lg'],
                ['url' => asset('images/review_gray_star.png'),'type' => 'icon','size' => 'lg'],
            ],
            4 => [
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'lg'],
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'lg'],
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'lg'],
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'lg'],
                ['url' => asset('images/review_gray_star.png'),'type' => 'icon','size' => 'lg'],
            ],
            5 => [
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'lg'],
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'lg'],
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'lg'],
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'lg'],
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'lg'],
            ],
        ];
        $this->small_stars = [
            1 => [
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'sm'],
                ['url' => asset('images/review_gray_star.png'),'type' => 'icon','size' => 'sm'],
                ['url' => asset('images/review_gray_star.png'),'type' => 'icon','size' => 'sm'],
                ['url' => asset('images/review_gray_star.png'),'type' => 'icon','size' => 'sm'],
                ['url' => asset('images/review_gray_star.png'),'type' => 'icon','size' => 'sm'],
            ],
            2 => [
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'sm'],
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'sm'],
                ['url' => asset('images/review_gray_star.png'),'type' => 'icon','size' => 'sm'],
                ['url' => asset('images/review_gray_star.png'),'type' => 'icon','size' => 'sm'],
                ['url' => asset('images/review_gray_star.png'),'type' => 'icon','size' => 'sm'],
            ],
            3 => [
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'sm'],
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'sm'],
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'sm'],
                ['url' => asset('images/review_gray_star.png'),'type' => 'icon','size' => 'sm'],
                ['url' => asset('images/review_gray_star.png'),'type' => 'icon','size' => 'sm'],
            ],
            4 => [
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'sm'],
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'sm'],
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'sm'],
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'sm'],
                ['url' => asset('images/review_gray_star.png'),'type' => 'icon','size' => 'sm'],
            ],
            5 => [
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'sm'],
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'sm'],
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'sm'],
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'sm'],
                ['url' => asset('images/review_gold_star.png'),'type' => 'icon','size' => 'sm'],
            ],
        ];
    }

    public function pushMessage($to, MessageBuilder $messageBuilder, $model = null)
    {
        //LINEを送れなくする
        if(!config('const.is_line_enabled')){
            return false;
        }


        $log_line_message = new LogLineMessage;

        $res = parent::pushMessage($to, $messageBuilder);
        $http_status = $res->getHTTPStatus();
        if ($model instanceof TblPatient) {
            $log_line_message->type = 1;
            $log_line_message->application_type = 1;
            $log_line_message->tbl_patient_id = $model->tbl_patient_id;
            $log_line_message->line_user_id = $model->line_user_id;
        } elseif ($model instanceof MstMaternityUser) {
            $log_line_message->type = 2;
            $log_line_message->application_type = 1;
            $log_line_message->mst_maternity_user_id = $model->mst_maternity_user_id;
            $log_line_message->line_user_id = $model->line_user_id;
        }else{
            $log_line_message->type = 3;
            $log_line_message->application_type = 1;
            $log_line_message->line_user_id = $to;
        }
        $log_line_message->message = json_encode($messageBuilder->buildMessage());
        $log_line_message->http_status = $http_status;
        $log_line_message->save();

        if($http_status!=200){
            event(new \App\Events\LineErrorSendEvent($log_line_message));
        }

        return $res;
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

            $tbl_liff = TblLiff::where('code', $code)->orderByDesc('tbl_liff_id')->first();

            $profile = $this->getProfile($line_user_id)->getJSONDecodedBody();

//            $tbl_patient->mst_maternity_id = $this->mst_maternity->mst_maternity_id;
            $tbl_patient->code = $code;
            $tbl_patient->line_name = $profile['displayName'];
            $tbl_patient->line_user_id = $line_user_id;
            $tbl_patient->line_picture_url = $profile['pictureUrl'];
//            $tbl_patient->review_point = $this->mst_maternity->review_point;

            $tbl_patient->tbl_maternity_id = $tbl_liff->tbl_maternity_id;
            $tbl_patient->save();

            //リッチメニューIDを紐づける対応が必要

//            $this->pushMessage($line_user_id, new TextMessageBuilder("フォローを確認\nリッチメニューに付けるBSのリンク\n" . config('app.url') . '/' . $code . '?openExternalBrowser=1'), $tbl_patient);
            $this->pushMessageFollow($tbl_patient);
            $this->makeSetMaternityRichMenu($tbl_patient);
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

            //リッチメニューも削除
            $tbl_patient->richmenu_id = null;
            $tbl_patient->save();

            //提出済みの場合は削除しない。データを有効のものとして残す。フォロー解除のみ。
            if(!$tbl_patient->submitted_at){
                $tbl_patient->delete();
            }
        }
    }
}

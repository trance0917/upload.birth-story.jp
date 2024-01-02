<?php
namespace App\Services;

use App\Models\LogLineMessage;
use App\Models\MstMaternityUser;
use App\Models\TblPatient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use LINE\LINEBot;
use LINE\LINEBot\MessageBuilder;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;

class LineBotService extends LINEBot
{
    /** @var string */
    private $channelSecret;
    /** @var HTTPClient */
    private $httpClient;

    public function __construct() {
        dump(config('birthstory.line_message_channel_token'));
        dump(config('birthstory.line_message_channel_secret'));
        $httpClient = new CurlHTTPClient(config('birthstory.line_message_channel_token'));
        $args = ['channelSecret' => config('birthstory.line_message_channel_secret')];
        parent::__construct($httpClient, $args);
        $this->httpClient = $httpClient;
        $this->channelSecret = $args['channelSecret'];
    }

    public function pushMessage($to, MessageBuilder $messageBuilder, $model = null)
    {
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
        dump('follow');
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

//            $tbl_patient->mst_maternity_id = $this->mst_maternity->mst_maternity_id;
            $tbl_patient->code = $code;
            $tbl_patient->line_name = $profile['displayName'];
            $tbl_patient->line_user_id = $line_user_id;
            $tbl_patient->line_picture_url = $profile['pictureUrl'];
//            $tbl_patient->review_point = $this->mst_maternity->review_point;

            $tbl_patient->save();

            //リッチメニューIDを紐づける対応が必要

//            $this->pushMessage($line_user_id, new TextMessageBuilder("フォローを確認\nリッチメニューに付けるBSのリンク\n" . config('app.url') . '/' . $code . '?openExternalBrowser=1'), $tbl_patient);
            $this->pushMessageFollow($tbl_patient);
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
}

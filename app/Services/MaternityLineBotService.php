<?php
namespace App\Services;

use LINE\LINEBot;
use LINE\LINEBot\HTTPClient;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use App\Models\MstMaternity;
use App\Models\MstMaternityUser;
use App\Models\TblPatient;
use App\Models\LogLineMessage;

use LINE\LINEBot\MessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MaternityLineBotService extends LINEBot
{
    /** @var string */
    private $channelSecret;
    /** @var HTTPClient */
    private $httpClient;

    private $mst_maternity;

    public function __construct(MstMaternity $mst_maternity) {
        $httpClient = new CurlHTTPClient($mst_maternity->line_message_channel_token);
        $args = ['channelSecret' => $mst_maternity->line_message_channel_secret];
        parent::__construct($httpClient, $args);
        $this->httpClient = $httpClient;
        $this->channelSecret = $args['channelSecret'];
        $this->mst_maternity = $mst_maternity;
    }

    public function pushMessage($to, MessageBuilder $messageBuilder,$model=null)
    {
        $log_line_message = new LogLineMessage;

        if($model instanceof TblPatient){
            $log_line_message->type=1;
            $log_line_message->tbl_patient_id=$model->tbl_patient_id;
            $log_line_message->line_user_id=$model->line_user_id;
            $log_line_message->message=json_encode($messageBuilder->buildMessage());
            $log_line_message->save();
        }elseif($model instanceof MstMaternityUser){
            $log_line_message->type=2;
            $log_line_message->mst_maternity_user_id=$model->mst_maternity_user_id;
            $log_line_message->line_user_id=$model->line_user_id;
            $log_line_message->message=json_encode($messageBuilder->buildMessage());
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
        return $this->httpClient->get('https://api.line.me/v2/bot/group/' . urlencode($groupId) .'/summary');
    }

    public function follow($line_user_id){
        $tbl_patient = new TblPatient;
        $code = '';
        $m = null;

        DB::beginTransaction();
        try {
            while(true){
                $code = substr(str_shuffle('123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ'), 0, 8);
                $m = TblPatient::withTrashed()->where('code', $code)->first();
                if($m){
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
            $tbl_patient->richmenu_id = 'リッチメニューID';

            $this->pushMessage($line_user_id,new TextMessageBuilder("フォローを確認\nリッチメニューに付けるBSのリンク\n".config('app.url').'/'.$code.'?openExternalBrowser=1'),$tbl_patient);
            DB::commit();
        }catch(\Throwable $e){
            DB::rollback();
            Log::error($e);
        }
    }
    public function unfollow($line_user_id){
        $tbl_patients = TblPatient::where('line_user_id', $line_user_id)->get();
        foreach($tbl_patients AS $tbl_patient_key=>$tbl_patient){
            //リッチメニューIDを取得して解除＆削除する処理が必要
            $tbl_patient->richmenu_id=null;
            $tbl_patient->save();
            $tbl_patient->delete();
        }
        //todo リッチメニューを消す処理
    }

    public function sendReviewNotification(TblPatient $tbl_patient){
        //ユーザーに送る処理
        //指定評価以上だった場合のメッセージ
        if($tbl_patient->average_score >= $tbl_patient->mst_maternity->minimum_review_score){
            //googleの口コミをプッシュする
            $this->pushMessage($tbl_patient->line_user_id,new TextMessageBuilder(view('lines/review-patient-high-rating', ['tbl_patient'=>$tbl_patient,])->render()),$tbl_patient);
        }else{
            //そうでなかった場合のメッセージ
            $this->pushMessage($tbl_patient->line_user_id,new TextMessageBuilder(view('lines/review-patient-low-rating', ['tbl_patient'=>$tbl_patient,])->render()),$tbl_patient);
        }

        //産院スタッフに送る処理
        if($this->mst_maternity->mst_maternity_users->count()){
            foreach($this->mst_maternity->mst_maternity_users AS $mst_maternity_user_key=>$mst_maternity_user){
                //通知を許可しているか
                if($mst_maternity_user->is_review_notification){
                    //通知を受けるべき点数の場合
                    if($tbl_patient->average_score >= $this->mst_maternity->notification_review_score){
                        $this->pushMessage($mst_maternity_user->line_user_id,new TextMessageBuilder(view('lines/review-maternity-user', ['tbl_patient'=>$tbl_patient,])->render()),$mst_maternity_user);
                    }
                }
            }
        }
    }
    public function sendStoreCompleteNotification(TblPatient $tbl_patient){
        $this->pushMessage($tbl_patient->line_user_id,new TextMessageBuilder(view('lines/story-complete', ['tbl_patient'=>$tbl_patient,])->render()),$tbl_patient);
    }
    
    
    
    /**
     * 最初のリッチメニューを作成する
     * @return void
     */
    public function makeFirstRichMenu(){
        
    }

    /**
     * 写真提出後、レビューが無い場合のリッチメニュー
     * @return void
     */
    public function makeStorySubmittedRichMenu(){

    }

    /**
     * 写真提出後、レビューが有り、高評価の場合のリッチメニュー
     * @return void
     */
    public function makeHighScoreReviewRichMenu(){

    }

    /**
     * 写真提出後、レビューが有り、低評価の場合のリッチメニュー
     * @return void
     */
    public function makeLowScoreReviewRichMenu(){

    }

    /**
     * 1ヶ月健診、レビューが無い場合のリッチメニュー
     * @return void
     */
    public function makeHealthCheckRichMenu(){

    }

    /**
     * 1ヶ月健診、レビューが有り、高評価の場合のリッチメニュー
     * @return void
     */
    public function makeHealthCheckHighScoreReviewRichMenu(){

    }

    /**
     * 1ヶ月健診、レビューが有り、低評価の場合のリッチメニュー
     * @return void
     */
    public function makeHealthCheckLowScoreReviewRichMenu(){

    }

    /**
     * デフォルト(すべての手続きが終わった)のリッチメニュー
     * @return void
     */
    public function makeDefaultRichMenu(){

    }

}

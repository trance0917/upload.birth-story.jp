<?php
namespace App\Services;

use LINE\LINEBot;
use LINE\LINEBot\HTTPClient;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use App\Models\MstMaternity;
use App\Models\TblPatient;

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

        $str_r = substr(str_shuffle('123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ'), 0, 8);
        dump($str_r);
        dump($line_user_id);


    }

}

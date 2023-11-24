<?php
namespace App\Http\Controllers\General;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LineBotService as LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use App\Services\LineBotService;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use App\Models\MstMaternity;
use App\Models\LogLineWebhook;


final class WebHookController extends Controller
{
    public function index(Request $request){
        if ($_SERVER['HTTP_HOST']=='local.upload.birth-story.jp:8087') {
            $request->destination = 'U92d0798c12c2fdf7cca244be08611be5';//テスト産婦人科
            $request->destination = 'U521b4fe8ebf2b9d99383034188975e81';//テストマタニティクリニック
            $request->events = json_decode(<<<JSON
            [{"type": "message","message": {
            "type": "text",
				"id": "483138207442010130","quoteToken": "Ne0LeVWnZDKvQsb5ZZNbVSHy0jehLqIdr16xZvNvwBqd60WIL72P7rCpvFDB_brEfEASjqMHD-ZgX7x9rMs8sa9lcZ2Y4_gLw886MydK8I32-jBKqq5RcETDrcD1mueQGYjlEc-tD0qk1POPzTUdjg",
				"text": "産院担当"
			},
			"webhookEventId": "01HFZX6FZCXQ40FW3M7F94CKK9","deliveryContext": {"isRedelivery": false},
			"timestamp": 1700804116338,"source": {"type": "user","userId": "U42daeeae41b7d137194c58c41fab5306"},"replyToken": "4bd7423be7be440689c4fcc8c77b4e87","mode": "active"
		}]
JSON,true);
        }

        $mst_maternity = MstMaternity::where('line_destination', $request->destination)->first();
        
        if($mst_maternity){
            
            $line_bot_service = new LineBotService(new CurlHTTPClient($mst_maternity->line_message_channel_token),['channelSecret' => $mst_maternity->line_message_channel_secret]);
            
            if($request->events){
                foreach($request->events AS $event_key=>$event){
                    $event_type = $event['type'];
                    $log_line_webhook = new LogLineWebhook;
                    $log_line_webhook->type = $event['type'];
                    $log_line_webhook->mst_maternity_id = $mst_maternity->mst_maternity_id;
                    $log_line_webhook->line_user_id = $event['source']['userId'];
                    $log_line_webhook->api_data = $request->all();
                    $log_line_webhook->save();
                    
                    
                    if($event_type=='message'){
                        if($event['message']['type']=='text'){
                            if($event['message']['text']=='産院担当者'){
                                //$line_bot_service->maternityStaffuEntry();
                                //産院担当者へメールを送る処理
                                $profile = $line_bot_service->getProfile($event['source']['userId'])->getJSONDecodedBody();
                                $line_bot_service->pushMessage($event['source']['userId'],new TextMessageBuilder(view('lines/new-staff',
                                    [
                                        'line_user_id'=>$event['source']['userId'],
                                        'line_name'=>$profile['displayName'],
                                    ]
                                )->render()));
                            }else{
                                //何かしらの応答メッセージを作る
                            }
//                        $profile['pictureUrl']
                        }
                    }elseif($event_type=='follow'){
                        //$line_bot_service->follow();
                    }elseif($event_type=='unfollow'){
                        //$line_bot_service->unfollow();
                    }

                    
                    
                    
                    
                }
            }else{
                $log_line_webhook = new LogLineWebhook;
                $log_line_webhook->type = 'events empty';
                $log_line_webhook->api_data = $request->all();
                $log_line_webhook->save();
            }
        }else{
            $log_line_webhook = new LogLineWebhook;
            $log_line_webhook->type = 'destination empty';
            $log_line_webhook->api_data = $request->all();
            $log_line_webhook->save();
        }


    }

    public function test(Request $request){
//        $data = $request->all();
//        $events = $data['events'];

        $httpClient = new CurlHTTPClient(config('services.line.message.channel_token'));
        $bot = new LINEBot($httpClient, ['channelSecret' => config('services.line.message.channel_secret')]);
        $message = "画像が送れるか";
        $textMessageBuilder = new TextMessageBuilder($message);
        $response = $bot->pushMessage('Ue10f7778b40a1ba8ca5541d1ae5f5925', $textMessageBuilder);
        $response = $bot->pushMessage('Ue10f7778b40a1ba8ca5541d1ae5f5925', new \LINE\LINEBot\MessageBuilder\ImageMessageBuilder('https://birth-story.jp/images/index-insta-9.png', 'https://birth-story.jp/images/index-insta-9.png'));

        return;
    }
    public function github(Request $request){
        exec("cd /var/www/dev.upload.birth-story.jp ; git pull",$opt, $return_ver);
//        exec("cd /var/www/dev.upload.birth-story.jp ; echo 'sakura0917' | sudo -S git pull",$opt, $return_ver);
//        $a = chdir('/var/www/dev.upload.birth-story.jp');
//        dump($a);
//        dump(exec("whoami"));
//        dump(exec("pwd"));

//        dump(exec("cd /var/www/dev.upload.birth-story.jp ; git pull",$opt, $return_ver));
//        dump($opt);
//        dump( '実行結果：'.$return_ver);
//        dump(exec("cd /var/www/dev.upload.birth-story.jp ; echo 'sakura0917' | sudo -S git pull",$opt, $return_ver));
//        dump($opt);
//        dump( '実行結果：'.$return_ver);
        
        //        dump(exec($cmd, $opt, $return_ver));
//        
//        dump($opt);
//        dump( '実行結果：'.$return_ver);
        
//        $cmd = "echo 'sakura0917' | sudo -S git pull";
//        dump(exec($cmd, $opt, $return_ver));
//        
//        dump($opt);
//        dump( '実行結果：'.$return_ver);
    }
}

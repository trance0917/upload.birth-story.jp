<?php
namespace App\Http\Controllers\General;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LineBotService as LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use App\Models\MstMaternity;

final class WebHookController extends Controller
{
    public function index(MstMaternity $mst_maternity,Request $request){
        dump($mst_maternity);
        dump($request->all());
        
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

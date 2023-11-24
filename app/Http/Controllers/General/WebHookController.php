<?php
namespace App\Http\Controllers\General;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LineBotService as LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;

final class WebHookController extends Controller
{
    public function index(int $mst_maternity_id,Request $request){
        dump($mst_maternity_id);
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
//        dump($response);
//        foreach ($events as $event) {
//aaaa
        
//        }
        return;
    }
    public function github(Request $request){
        $a = chdir('/var/www/dev.upload.birth-story.jp');
        dump($a);
        dump(exec("whoami"));
        dump(exec("pwd"));
        $cmd = "echo 'sakura0917' | sudo -S git pull";
        dump(exec($cmd, $opt, $return_ver));
        
        dump($opt);
        dump( '実行結果：'.$return_ver);
    }
}

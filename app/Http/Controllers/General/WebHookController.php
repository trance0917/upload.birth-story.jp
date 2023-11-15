<?php
namespace App\Http\Controllers\General;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

final class WebHookController extends Controller
{
    public function index(int $mst_maternity_id,Request $request){

        dump($mst_maternity_id);
        dump($request->all());

    }
}

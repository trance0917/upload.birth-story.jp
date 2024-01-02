<?php

namespace App\Http\Controllers;

use App\Models\MstMaternity;
use App\Services\MaternityLineBotService;
use App\Services\PatientService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


class MaternityController extends Controller
{
    public function index(MstMaternity $mst_maternity,Request $request){

        //1分 60分 24時間 30日
        Cookie::queue('mst_maternity_id', $mst_maternity->mst_maternity_id, 1*60*24*30);
        return view('general.maternity.index',compact('mst_maternity'));
    }

}

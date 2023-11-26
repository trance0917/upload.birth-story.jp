<?php

namespace App\Http\Controllers\General;

use App\Events\ContactSendEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TblPatient;

class StoryController extends Controller
{
    public function index(TblPatient $tbl_patient,Request $request){
        return view('general.story.index',compact('tbl_patient'));
    }
    public function confirm(TblPatient $tbl_patient,Request $request){
        return view('general.story.confirm',compact('tbl_patient'));
    }
    public function complete(TblPatient $tbl_patient,Request $request){

        if($request->action == 'return'){
            return redirect()->route('story-index',$tbl_patient);
        }
//        if(env('APP_ENV')=='production'){
//            session()->regenerateToken();
//        }

        //本来到達しないが万が一完了ユーザーからもう一度来た場合飛ばす
        if($tbl_patient->submitted_at){
            return redirect()->route('guide',$tbl_patient);
        }



        $tbl_patient->submitted_at = now();
        $tbl_patient->save();
        return redirect()->route('guide',$tbl_patient);
//        return view('general.story.complete',compact('tbl_patient'));
    }
}

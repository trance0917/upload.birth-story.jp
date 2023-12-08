<?php

namespace App\Http\Controllers\General;

use App\Events\ContactSendEvent;
use App\Http\Controllers\Controller;
use App\Services\MaternityLineBotService;
use App\Services\PatientService;
use Illuminate\Http\Request;
use App\Models\TblPatient;

class StoryController extends Controller
{
    public function index(TblPatient $tbl_patient,Request $request){
        $tbl_patient = TblPatient::with([
            'tbl_patient_mediums'=>function ($query){
                //ファイル名 空にしているのはミューテタで取得できるため
                $query->select(['tbl_patient_id','extension','tbl_patient_medium_id','type','file_name','order'])->selectRaw('\'\' AS `src`')->orderBy('type')->orderBy('order');
            },
            'tbl_patient_mediums.tbl_patient:tbl_patient_id,code'
        ])->select(['tbl_patient_id','mst_maternity_id','line_picture_url','code','name','roman_alphabet','baby_name','baby_roman_alphabet','birth_day','birth_time','weight','height','sex','what_number','health_check_date','message','is_use_instagram','submitted_at'])->find($tbl_patient->tbl_patient_id);
        return view('general.story.index',compact('tbl_patient'));
    }

    public function index_json(TblPatient $tbl_patient,Request $request){
        $tbl_patient = TblPatient::with([
            'tbl_patient_mediums'=>function ($query){
                //ファイル名 空にしているのはミューテタで取得できるため
                $query->select(['tbl_patient_id','extension','tbl_patient_medium_id','type','file_name','order'])->selectRaw('\'\' AS `src`');
            },
            'tbl_patient_mediums.tbl_patient:tbl_patient_id,code'
        ])->select(['tbl_patient_id','mst_maternity_id','code','name','roman_alphabet','baby_name','baby_roman_alphabet','birth_day','birth_time','weight','height','sex','what_number','health_check_date','message','is_use_instagram','submitted_at'])->find($tbl_patient->tbl_patient_id);
        return response()->json([
            'result' => false,
            'messages' => '',
            'errors' => $tbl_patient,
        ], 400);
    }

    public function confirm(TblPatient $tbl_patient,Request $request){
        $tbl_patient = TblPatient::with([
            'tbl_patient_mediums'=>function ($query){
                //ファイル名 空にしているのはミューテタで取得できるため
                $query->select(['tbl_patient_id','extension','tbl_patient_medium_id','type','file_name','order'])->selectRaw('\'\' AS `src`')->orderBy('type')->orderBy('order');
            },
            'tbl_patient_mediums.tbl_patient:tbl_patient_id,code',
            'mst_maternity:mst_maternity_id,name',
        ])->select(['tbl_patient_id','mst_maternity_id','line_picture_url','code','name','roman_alphabet','baby_name','baby_roman_alphabet','birth_day','birth_time','weight','height','sex','what_number','health_check_date','message','is_use_instagram','submitted_at'])->find($tbl_patient->tbl_patient_id);
        return view('general.story.confirm',compact('tbl_patient'));
    }
    public function complete(TblPatient $tbl_patient,Request $request,PatientService $patient_service){

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


        $maternity_line_bot_service = new MaternityLineBotService($tbl_patient->mst_maternity);
        $maternity_line_bot_service->sendStoreCompleteNotification(TblPatient::find($tbl_patient->tbl_patient_id));

        $tbl_patient->submitted_at = now();
        $tbl_patient->save();

        //受け取るファイルの作成
        $patient_service->createAdoptMediums($tbl_patient);

        return redirect()->route('review',$tbl_patient);
//        return view('general.story.complete',compact('tbl_patient'));
    }
}

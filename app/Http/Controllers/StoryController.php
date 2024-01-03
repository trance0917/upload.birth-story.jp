<?php

namespace App\Http\Controllers;

use App\Models\TblPatient;
use App\Services\LineBotService;
use App\Services\PatientService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;


class StoryController extends Controller
{
    public function index(TblPatient $tbl_patient,Request $request){
        $tbl_patient = TblPatient::with([
            'tbl_patient_mediums'=>function ($query){
                //ファイル名 空にしているのはミューテタで取得できるため
                $query->select(['tbl_patient_id','extension','tbl_patient_medium_id','type','file_name','order'])->selectRaw('\'\' AS `src`')->orderBy('type')->orderBy('order');
            },
            'tbl_patient_mediums.tbl_patient:tbl_patient_id,code',
            'mst_maternity:mst_maternity_id,name',
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


        $line_bot_service = new LineBotService();
        $line_bot_service->pushMessageStorySubmitted($tbl_patient);
        $line_bot_service->makeStorySubmittedRichMenu($tbl_patient);


        DB::beginTransaction();
        try {
            $tbl_patient->submitted_at = now();
            $tbl_patient->save();

            //受け取るファイルの作成
            $patient_service->createAdoptMediums($tbl_patient);
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            Log::error($e);
            echo('エラーが発生しました。提出が完了していません。');
            exit;
        }

        return redirect()->route('review',$tbl_patient)->with('flash_message', '提出が完了しました');
//        return view('general.story.complete',compact('tbl_patient'));
    }
    public function dl(TblPatient $tbl_patient){

        $zip_file_name = $tbl_patient->local_src.'/data.zip';
        if(File::exists($zip_file_name)){
            header('Content-Type: application/force-download;');
            header('Content-Length: '.filesize($zip_file_name));
            header('Content-Disposition: attachment; filename="'.$tbl_patient->mst_maternity->name.'_'.$tbl_patient->tbl_patient_id.'_'.$tbl_patient->name.'.zip"');
            readfile($zip_file_name);
        }else{
            abort(404);
        }
    }
}

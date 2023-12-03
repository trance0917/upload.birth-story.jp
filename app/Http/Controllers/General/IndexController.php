<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Services\MaternityLineBotService;
use App\Services\MaternityService;
use App\Services\PatientService;
use Illuminate\Http\Request;
use App\Models\TblPatient;
use App\Models\TblPatientReview;
use App\Models\MstMaternityQuestion;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\FlexMessageBuilder;


class IndexController extends Controller
{
    public function index(TblPatient $tbl_patient,Request $request,PatientService $patient_service){

//        $bubble_container_builder = new \LINE\LINEBot\MessageBuilder\Flex\ContainerBuilder\BubbleContainerBuilder(
//            \LINE\LINEBot\Constant\Flex\ContainerDirection::LTR,
//            null,
//            null,
//            null,
//            null,
//            null,
//        );
//        $maternity_line_bot_service = new MaternityLineBotService($tbl_patient->mst_maternity);
//        $maternity_line_bot_service->pushMessage($tbl_patient->line_user_id,new FlexMessageBuilder('高評価ありがとうございます',$bubble_container_builder),$tbl_patient);


        $patient_service->createAdoptMediums($tbl_patient);

        return view('general.guide',compact('tbl_patient'));
    }

    public function review(TblPatient $tbl_patient,Request $request,MaternityService $maternity_service){

        //質問事項
        $mst_maternity_questions =  $maternity_service->getMstMaternityQuestions($tbl_patient->mst_maternity->mst_maternity_id);
        //登録済みであればそのデータを返す
        if($tbl_patient->tbl_patient_reviews->count()){
            $inputs = TblPatient::with(['tbl_patient_reviews:tbl_patient_review_id,tbl_patient_id,mst_maternity_question_id,score'])
                ->select(['*'])->where(['tbl_patient_id'=>$tbl_patient->tbl_patient_id])->first();
        }else{
            //無い場合は型を取るためにquestionsから構造を取る
            $inputs['tbl_patient_reviews'] = $maternity_service->getMstMaternityQuestions($tbl_patient->mst_maternity->mst_maternity_id);
        }
        return view('general.review',compact('inputs','tbl_patient','mst_maternity_questions'));
    }

    public function review_json(TblPatient $tbl_patient,Request $request,MaternityService $maternity_service){
        $inputs = TblPatient::with(['tbl_patient_reviews:tbl_patient_review_id,tbl_patient_id,mst_maternity_question_id,score'])
            ->select(['tbl_patient_id','review'])->where(['tbl_patient_id'=>$tbl_patient->tbl_patient_id])->first();

//        $inputs['tbl_patient_reviews'] = $maternity_service->getMstMaternityQuestions($tbl_patient->mst_maternity->mst_maternity_id);
        return response()->json($inputs);
    }

}

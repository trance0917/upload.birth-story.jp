<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MstMaternityQuestion;
use App\Models\TblPatient;
use App\Models\TblPatientReview;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Cache;
use App\Services\ReviewService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PatientController extends Controller
{
    public function storeReview(TblPatient $tbl_patient,Request $request) {

        $validator = Validator:: make([
            'tbl_patient' => $request->tbl_patient,
        ], [
            //tbl_supplier
            'tbl_patient.review' => 'required',
            'tbl_patient.paypayid' => 'required',
            'tbl_patient.tbl_patient_reviews.*.score' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'result' => false,
                'messages' => '',
                'errors' => $validator->errors(),
            ], 400);
        }

        DB::beginTransaction();

        try {
            foreach($request->tbl_patient['tbl_patient_reviews'] AS $tbl_patient_review_key=>$tbl_patient_review_input){
                $tbl_patient_review = new TblPatientReview;
                $tbl_patient_review->tbl_patient_id = $tbl_patient->tbl_patient_id;
                $tbl_patient_review->fill($tbl_patient_review_input);
                $tbl_patient_review->save();
            }
            $tbl_patient->review = $request->tbl_patient['review'];
            $tbl_patient->paypayid = $request->tbl_patient['paypayid'];
            $tbl_patient->save();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            Log::error($e);
            return response()->json([
                'result' => false,
                'messages' => $e->getMessage(),
                'errors' => [],
            ], 500);
        }

        //todo: 規定評価以上なら産院にメッセージを送る
        sleep(1);
        return response()->json([
            'result' => true,
            'messages' => '',
            'errors' => [],
        ]);
    }

    public function storeStory(TblPatient $tbl_patient,Request $request){
        sleep(1);
        $validator = Validator:: make([
            'tbl_patient' => $request->tbl_patient,
        ], [
            //tbl_supplier
            'tbl_patient.name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'result' => false,
                'messages' => '',
                'errors' => $validator->errors(),
            ], 400);
        }

        DB::beginTransaction();
        try {
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            Log::error($e);
            return response()->json([
                'result' => false,
                'messages' => $e->getMessage(),
                'errors' => [],
            ], 500);
        }

        return response()->json([
            'result' => true,
            'messages' => '',
            'errors' => [],
        ]);
    }

    public function storeStoryInput(TblPatient $tbl_patient,Request $request){
//        sleep(1);
        $validator = Validator:: make([
            'tbl_patient' => $request->tbl_patient,
        ], [
            //tbl_supplier
            $request->key => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'result' => false,
                'messages' => '',
                'errors' => $validator->errors(),
            ], 400);
        }

        DB::beginTransaction();
        try {
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            Log::error($e);
            return response()->json([
                'result' => false,
                'messages' => $e->getMessage(),
                'errors' => [],
            ], 500);
        }
        return response()->json([
            'result' => true,
            'messages' => '',
            'errors' => [],
        ]);
    }
    public function storeStoryMedium(TblPatient $tbl_patient,Request $request){
        return response()->json([
            'result' => true,
            'messages' => '',
            'errors' => [],
        ]);
    }
}

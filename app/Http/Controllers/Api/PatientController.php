<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MstMaternityQuestion;
use App\Models\TblPatient;
use App\Models\TblPatientMedium;
use App\Models\TblPatientReview;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Cache;
use App\Services\ReviewService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use App\Services\PatientService;

class PatientController extends Controller
{
    public function storeReview(TblPatient $tbl_patient,Request $request,PatientService $patient_service) {

        $result = $patient_service->storeReview($tbl_patient,$request->tbl_patient);

        if (!$result['result']) {
            $res = response()->json([
                'messages' => $result['messages'],
                'errors' => $result['errors'],
            ], 400);
            throw new HttpResponseException($res);
        }

        //todo: 規定評価以上なら産院にメッセージを送る
        return response()->json([
            'result' => true,
            'messages' => '',
            'errors' => [],
        ]);
    }

    public function storeStory(TblPatient $tbl_patient,Request $request,PatientService $patient_service){
        $result = $patient_service->storeStory($tbl_patient);
        if (!$result['result']) {
            $res = response()->json([
                'messages' => $result['messages'],
                'errors' => $result['errors'],
            ], 400);
            throw new HttpResponseException($res);
        }
        return response()->json([
            'result' => true,
            'messages' => '',
            'errors' => [],
        ]);
    }

    public function storeStoryInput(TblPatient $tbl_patient,Request $request,PatientService $patient_service){
        if($tbl_patient->submitted_at){
            return response()->json([
                'result' => true,
                'messages' => '',
                'errors' => [],
            ]);
        }
        if(!isset($patient_service->validate_rules[$request->key])){
            return response()->json(['result' => false,'messages' => '存在しないキー','errors' => [],]);
        }
        $result = $patient_service->storeStoryInput($tbl_patient,$request->tbl_patient,$request->key);
        if (!$result['result']) {
            $res = response()->json([
                'messages' => $result['messages'],
                'errors' => $result['errors'],
            ], 400);
            throw new HttpResponseException($res);
        }
        return response()->json([
            'result' => true,
            'messages' => '',
            'errors' => [],
        ]);
    }
    public function storeStoryMedium(TblPatient $tbl_patient,Request $request,PatientService $patient_service){
        if($tbl_patient->submitted_at){
            return response()->json([
                'result' => true,
                'messages' => '',
                'errors' => [],
            ]);
        }

        $result = $patient_service->storeStoryMedium($tbl_patient,$request->tbl_patient,$request->key);
        if (!$result['result']) {
            $res = response()->json([
                'messages' => $result['messages'],
                'errors' => $result['errors'],
            ], 400);
            throw new HttpResponseException($res);
        }
        
        return response()->json([
            'result' => $result['result'],
            'messages' => '',
            'errors' => [],
        ]);
    }
    
    public function storeStoryMediumSort(TblPatient $tbl_patient,Request $request,PatientService $patient_service){
        if($request->tbl_patient_medium_ids){
            $result = $patient_service->mediumSort($request->tbl_patient_medium_ids);
        }
        return response()->json([
            'result' => $result['result'],
            'messages' => '',
            'errors' => [],
        ]);
    }
}

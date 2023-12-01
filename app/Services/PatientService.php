<?php
namespace App\Services;

use App\Models\MstMaternityQuestion;
use App\Models\TblPatientMedium;
use App\Models\TblPatientReview;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PatientService{

    public $validate_rules=[
        'tbl_patient.name' => 'required',
        'tbl_patient.roman_alphabet' => 'required',
        'tbl_patient.baby_name' => 'nullable',
        'tbl_patient.baby_roman_alphabet' => 'nullable',
        'tbl_patient.birth_day' => 'required|date',
        'tbl_patient.birth_time' => 'required|date_format:H:i',
        'tbl_patient.weight' => 'required|integer|between:500,6500',
        'tbl_patient.height' => 'required|numeric|between:19.0,63.0',
        'tbl_patient.sex' => 'required|in:1,2',
        'tbl_patient.what_number' => 'required|in:1,2,3,4,5,6,7,8,9',
        'tbl_patient.health_check' => 'required|date',
        'tbl_patient.message' => 'nullable|max:200',
        'tbl_patient.is_use_instagram' => 'required|in:1,2',
    ];
    
    public function mediumSort($tbl_patient_medium_ids){
        $order = 0;
        foreach($tbl_patient_medium_ids AS $tbl_patient_medium_id){
            $order++;
            $tbl_patient_medium = TblPatientMedium::find($tbl_patient_medium_id);
            $tbl_patient_medium->order = $order;
            $tbl_patient_medium->save();
        }
        return [
            'result' => true
        ];
    }
    public function storeReview($tbl_patient,$tbl_patient_input){
        $validator = Validator:: make([
            'tbl_patient' => $tbl_patient_input,
        ], [
            //tbl_supplier
            'tbl_patient.review' => 'required',
            'tbl_patient.paypayid' => 'required',
            'tbl_patient.tbl_patient_reviews.*.score' => 'required',
        ]);
        if ($validator->fails()) {
            return [
                'result' => false,
                'messages' => '',
                'errors' => $validator->errors(),
            ];
        }

        DB::beginTransaction();

        try {
            foreach($tbl_patient_input['tbl_patient_reviews'] AS $tbl_patient_review_key=>$tbl_patient_review_input){
                $tbl_patient_review = new TblPatientReview;
                $tbl_patient_review->tbl_patient_id = $tbl_patient->tbl_patient_id;
                $tbl_patient_review->fill($tbl_patient_review_input);
                $tbl_patient_review->save();
            }
            $tbl_patient->review = $tbl_patient_input['review'];
            $tbl_patient->paypayid = $tbl_patient_input['paypayid'];
            $tbl_patient->save();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            Log::error($e);
            return [
                'result' => false,
                'messages' => $e->getMessage(),
                'errors' => [],
            ];
        }
        return [
            'result' => true,
            'messages' => '',
            'errors' => [],
        ];
    }

    public function storeStoryInput($tbl_patient,$tbl_patient_input,$key){
        $validator = Validator:: make([
            'tbl_patient' => $tbl_patient_input,
        ], [
            $key => $this->validate_rules[$key],
        ]);
        if ($validator->fails()) {
            return [
                'result' => false,
                'messages' => '',
                'errors' => $validator->errors(),
            ];
        }

        DB::beginTransaction();
        try {
            $tbl_patient->fill($tbl_patient_input);
            $tbl_patient->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            Log::error($e);
            return [
                'result' => false,
                'messages' => $e->getMessage(),
                'errors' => [],
            ];
        }
        
        return [
            'result' => true,
            'messages' => '',
            'errors' => [],
        ];
    }

}

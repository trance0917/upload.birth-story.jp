<?php
namespace App\Services;

use App\Models\MstMaternityQuestion;
use App\Models\TblPatientMedium;

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
}

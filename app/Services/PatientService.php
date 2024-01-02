<?php
namespace App\Services;

use App\Models\MstMaternityQuestion;
use App\Models\TblPatientMedium;
use App\Models\TblPatientReview;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use ZipArchive;

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
        'tbl_patient.health_check_date' => 'required|date',
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
        $rules = [
            //tbl_supplier
            'tbl_patient.review' => 'required',
            'tbl_patient.tbl_patient_reviews.*.score' => 'required',
        ];
        if($tbl_patient->review_point){
            $rules['tbl_patient.amazon_id'] = 'required';
        }
        $validator = Validator:: make([
            'tbl_patient' => $tbl_patient_input,
        ], $rules);
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
            if($tbl_patient->review_point){
                $tbl_patient->payment_status = 2;
            }else{
                $tbl_patient->payment_status = 3;
            }

            $tbl_patient->amazon_id = $tbl_patient_input['amazon_id']??null;
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

    public function storeStory($tbl_patient){
        $rules = $this->validate_rules;

        foreach(TblPatientMedium::$type_counts AS $type_count_key=>$type_count){
            if($type_count_key=='first_cry' || $type_count_key=='movie'){
                $rules['tbl_patient.tbl_patient_mediums.'.$type_count_key] = 'nullable|array|max:'.$type_count;
            }else{
                $rules['tbl_patient.tbl_patient_mediums.'.$type_count_key] = 'required|array|size:'.$type_count;
            }
        }

        $valid = [
            'tbl_patient' => $tbl_patient->toArray(),
        ];

        foreach(TblPatientMedium::$type_counts AS $type_count_key=>$type_count){
            $valid['tbl_patient']['tbl_patient_mediums'][$type_count_key] = $tbl_patient->tbl_patient_mediums->filter(function ($value) use($type_count_key) {return $value->type==$type_count_key;})->toArray();
            if(!$valid['tbl_patient']['tbl_patient_mediums'][$type_count_key]){
                $valid['tbl_patient']['tbl_patient_mediums'][$type_count_key]=null;
            }
        }

        $validator = Validator:: make($valid, $rules,['size'=>'枚数が不足しています。']);
        if ($validator->fails()) {
            return [
                'result' => false,
                'messages' => '',
                'errors' => $validator->errors(),
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
    public function storeStoryMedium($tbl_patient,$tbl_patient_input,$key){
        $validator = Validator:: make([
            'tbl_patient' => $tbl_patient_input,
        ], [
            'tbl_patient.tbl_patient_mediums.*.file' => 'mimes:jpg,bmp,png,mp4,mp3,mov',
        ]);
        if ($validator->fails()) {
            return [
                'result' => false,
                'messages' => '',
                'errors' => $validator->errors(),
            ];
        }

        //上書きの時に削除するための古いID
        $tbl_patient_medium_id=$tbl_patient_input['tbl_patient_mediums'][$key]['tbl_patient_medium_id']??null;

        $type=$tbl_patient_input['tbl_patient_mediums'][$key]['type'];
        $file=$tbl_patient_input['tbl_patient_mediums'][$key]['file'];

        $order = TblPatientMedium::where('tbl_patient_id', $tbl_patient->tbl_patient_id)
            ->where('type', $type)
            ->max('order');

        if (empty($order)) {
            $order = 0;//一枚目は1
        }

        if ($file instanceof UploadedFile) {
            $mime_type = explode('/',$file->getMimeType())[0];
            $directory_path = 'public/patients/'.$tbl_patient->tbl_patient_id.'_'.$tbl_patient->code;
            $original_directory_path = $directory_path.'/original';
            if(!\Storage::exists($directory_path)){
                \Storage::makeDirectory($directory_path);
                \Storage::makeDirectory($original_directory_path);
            }
            $filepath = pathinfo($file->getClientOriginalName());
            $filename = preg_replace('/[^0-9]/' ,'' , microtime());
            $medium=null;
            DB::beginTransaction();
            try {
                //新規の場合
                if(!$tbl_patient_medium_id){
                    $medium = [
                        'tbl_patient_id' => $tbl_patient->tbl_patient_id,
                        'file_name' => $filename,
                        'extension' => $mime_type=='image'?'jpg':$filepath['extension'],
                        'type' => $type,
                        'registered_at' => now(),
                        'order' => $order+1,
                    ];
                    $tbl_patient_medium = TblPatientMedium::create($medium);
                    if (empty($tbl_patient_medium)) {
                        throw new \Exception('');
                    }
                }else{
                    //更新の場合
                    $medium = [
                        'file_name' => $filename,
                        'extension' => $mime_type=='image'?'jpg':$filepath['extension'],
                        'type' => $type,
                        'registered_at' => now(),
                    ];
                    $tbl_patient_medium = TblPatientMedium::find($tbl_patient_medium_id);

                    //古い情報を取得しておくために事前にデータを取得
                    $old_file_name = $tbl_patient_medium->file_name;
                    $old_extension = $tbl_patient_medium->extension;

                    $tbl_patient_medium->fill($medium);
                    $tbl_patient_medium->save();
                }


                if($mime_type=='image'){
                    $img = \Image::make($file);
                    $img->orientate();
                    $img->save(storage_path('app/'.$original_directory_path.'/'.$filename . '.' . $medium['extension']),100,$medium['extension']);

                    //サムネイルの保存
                    $img = \Image::make($file);
                    $img->resize(350, null, function($constraint){
                        $constraint->aspectRatio(); // 縦横比にしてくれる
                        $constraint->upsize(); // 元画像より大きくならないようにする
                    });
                    $img->orientate();
                    $img->save(storage_path('app/'.$directory_path.'/'.$filename . '.' . $medium['extension']),100,$medium['extension']);
                }else{
                    $file->storeAs($original_directory_path, $filename . '.' . $medium['extension']);
                    $file->storeAs($directory_path, $filename . '.' . $medium['extension']);
                }

                //古いファイルは消しておく
                if($tbl_patient_medium_id){
                    \Storage::disk('local')->delete(''.$directory_path .'/'. $old_file_name.'.'.$old_extension);
                    \Storage::disk('local')->delete(''.$original_directory_path .'/'. $old_file_name.'.'.$old_extension);
                }

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
        }
        $tbl_patient_medium->src = $tbl_patient_medium->src;
        return [
            'result' => $tbl_patient_medium,
            'messages' => '',
            'errors' => [],
        ];
    }

    public function createAdoptMediums($tbl_patient){
        $directory_path = 'public/patients/'.$tbl_patient->tbl_patient_id.'_'.$tbl_patient->code.'/adoption';
        if(!\Storage::exists($directory_path)) {
            umask(0);
            \Storage::makeDirectory($directory_path,0777);
        }
        foreach($tbl_patient->tbl_patient_mediums AS $tbl_patient_medium_key => $tbl_patient_medium){
            \Storage::putFileAs($directory_path,$tbl_patient_medium->local_original_src,$tbl_patient_medium->submitted_file_name);
        }

        $zip = new \ZipArchive();
        $zip_path = storage_path('app/public/patients/'.$tbl_patient->tbl_patient_id.'_'.$tbl_patient->code.'/data.zip');

        $zip->open($zip_path, ZipArchive::CREATE | ZipArchive::OVERWRITE);

        foreach(glob(storage_path('app/'.$directory_path).'/*') AS $key=>$val){
            $zip->addFile($val,basename($val));
        }
        $zip->close();
        \Storage::disk('local')->deleteDirectory($directory_path);
    }
}

<?php
namespace App\Services;

use App\Models\MstMaternityQuestion;

class ReviewService
{
    public function getMstMaternityQuestions($mst_maternity_id){
        $mst_maternity_questions = MstMaternityQuestion::select([
            'mst_maternity_question_id',
            'mst_maternity_id',
            'question',
        ])
            ->where(['mst_maternity_id'=>$mst_maternity_id])
            ->orderBy('order')
            ->get();
        return $mst_maternity_questions;
    }

}

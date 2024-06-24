<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblPatientReview
 *
 * @property int $tbl_patient_review_id
 * @property int $tbl_patient_id
 * @property int $mst_maternity_question_id
 * @property int $score
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TblPatientReview extends Model
{
	protected $table = 'tbl_patient_reviews';
	protected $primaryKey = 'tbl_patient_review_id';

	protected $casts = [
		'tbl_patient_id' => 'int',
		'mst_maternity_question_id' => 'int',
		'score' => 'int'
	];

	protected $fillable = [
		'tbl_patient_id',
		'mst_maternity_question_id',
		'score'
	];

    public function mst_maternity_question()
    {
        return $this->hasOne(MstMaternityQuestion::class, 'mst_maternity_question_id', 'mst_maternity_question_id');
    }


}

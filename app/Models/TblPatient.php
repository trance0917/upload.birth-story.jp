<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TblPatient
 *
 * @property int $tbl_patient_id
 * @property int $mst_maternity_id
 * @property string $code
 * @property string $line_name
 * @property string $line_user_id
 * @property string $richmenu_id
 * @property string|null $name
 * @property string|null $roman_alphabet
 * @property string|null $baby_name
 * @property string|null $baby_roman_alphabet
 * @property Carbon|null $birth_day
 * @property Carbon|null $birth_time
 * @property int|null $weight
 * @property float|null $height
 * @property int|null $sex
 * @property int|null $what_number
 * @property Carbon|null $health_check
 * @property string|null $message
 * @property int|null $is_use_instagram
 * @property string|null $review
 * @property string|null $paypayid
 * @property Carbon|null $completed_at
 * @property Carbon|null $undertook_at
 * @property int $undertook_by
 * @property string|null $memo
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TblPatient extends Model
{
	use SoftDeletes;
	protected $table = 'tbl_patients';
	protected $primaryKey = 'tbl_patient_id';

	protected $casts = [
		'mst_maternity_id' => 'int',
		'birth_day' => 'datetime',
		'birth_time' => 'datetime',
		'weight' => 'int',
		'height' => 'float',
		'sex' => 'int',
		'what_number' => 'int',
		'health_check' => 'datetime',
		'is_use_instagram' => 'int',
		'completed_at' => 'datetime',
		'undertook_at' => 'datetime',
		'undertook_by' => 'int'
	];

	protected $fillable = [
		'mst_maternity_id',
		'code',
		'line_name',
		'line_user_id',
		'richmenu_id',
		'name',
		'roman_alphabet',
		'baby_name',
		'baby_roman_alphabet',
		'birth_day',
		'birth_time',
		'weight',
		'height',
		'sex',
		'what_number',
		'health_check',
		'message',
		'is_use_instagram',
		'review',
		'paypayid',
		'completed_at',
		'undertook_at',
		'undertook_by',
		'memo'
	];

    public function mst_maternity()
    {
        return $this->hasOne(MstMaternity::class, 'mst_maternity_id', 'mst_maternity_id');
    }
}

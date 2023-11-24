<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TblPatientMedium
 * 
 * @property int $tbl_patient_medium_id
 * @property int $tbl_patient_id
 * @property int $type
 * @property Carbon|null $registered_at
 * @property string|null $registered_ext
 * @property int $order
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TblPatientMedium extends Model
{
	use SoftDeletes;
	protected $table = 'tbl_patient_mediums';
	protected $primaryKey = 'tbl_patient_medium_id';

	protected $casts = [
		'tbl_patient_id' => 'int',
		'type' => 'int',
		'registered_at' => 'datetime',
		'order' => 'int'
	];

	protected $fillable = [
		'tbl_patient_id',
		'type',
		'registered_at',
		'registered_ext',
		'order'
	];
}

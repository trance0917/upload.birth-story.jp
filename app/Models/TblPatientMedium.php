<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\SerializeDate;

/**
 * Class TblPatientMedium
 *
 * @property int $tbl_patient_medium_id
 * @property int $tbl_patient_id
 * @property int $type
 * @property Carbon|null $registered_at
 * @property string|null $extension
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
    use SerializeDate;
	protected $table = 'tbl_patient_mediums';
	protected $primaryKey = 'tbl_patient_medium_id';

	protected $casts = [
		'tbl_patient_id' => 'int',
		'registered_at' => 'datetime',
		'order' => 'int'
	];

	protected $fillable = [
		'tbl_patient_id',
		'type',
        'file_name',
		'registered_at',
		'extension',
		'order'
	];


    public static $type_counts = [
        'echo' => 2,
        'namecard' => 1,
        'pregnancy' => 6,
        'free' => 8,
        'photoart' => 3,
        'first_cry' => 1,
        'movie' => 1,
    ];

    public static $type_orders = [
        'echo' => 1,
        'namecard' => 2,
        'pregnancy' => 3,
        'free' => 4,
        'photoart' => 5,
        'first_cry' => 6,
        'movie' => 7,
    ];

    //基準とする通貨単位


    public function tbl_patient()
    {
        return $this->hasOne(TblPatient::class, 'tbl_patient_id', 'tbl_patient_id');
    }

    public function getSrcAttribute()
    {
        return config('app.url').'/storage/patients/'.$this->tbl_patient_id.'_'.$this->tbl_patient->code.'/'.$this->file_name.'.'.$this->extension;
    }

    public function getLocalOriginalSrcAttribute()
    {
        return storage_path('app/public/patients/'.$this->tbl_patient_id.'_'.$this->tbl_patient->code.'/original/'.$this->file_name.'.'.$this->extension);
    }

    public function getSubmittedFileNameAttribute()
    {
        return self::$type_orders[$this->type].'_'.$this->type.'_'.$this->order.'.'.$this->extension;
    }
}

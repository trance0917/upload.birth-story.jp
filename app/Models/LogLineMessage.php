<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LogLineMessage
 * 
 * @property int $log_line_message_id
 * @property string $type
 * @property int|null $tbl_patient_id
 * @property int|null $mst_maternity_user_id
 * @property string $line_user_id
 * @property string|null $memo
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class LogLineMessage extends Model
{
	use SoftDeletes;
	protected $table = 'log_line_messages';
	protected $primaryKey = 'log_line_message_id';

	protected $casts = [
		'tbl_patient_id' => 'int',
		'mst_maternity_user_id' => 'int'
	];

	protected $fillable = [
		'type',
		'tbl_patient_id',
		'mst_maternity_user_id',
		'line_user_id',
		'memo'
	];
}

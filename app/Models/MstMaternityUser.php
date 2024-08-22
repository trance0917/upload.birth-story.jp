<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MstMaternityUser
 *
 * @property int $mst_maternity_user_id
 * @property int $mst_maternity_id
 * @property string $name
 * @property string|null $line_user_id
 * @property int $is_review_notification
 * @property int $is_take_photoart
 * @property int $is_send_line
 * @property int $is_send_mail
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class MstMaternityUser extends Model
{
	use SoftDeletes;
	protected $table = 'mst_maternity_users';
	protected $primaryKey = 'mst_maternity_user_id';

	protected $casts = [
		'mst_maternity_id' => 'int',
		'is_review_notification' => 'int',
		'is_take_photoart' => 'int',
        'is_send_line' => 'int',
        'is_send_mail' => 'int',
	];

	protected $fillable = [
		'mst_maternity_id',
		'name',
		'line_user_id',
		'is_review_notification',
		'is_take_photoart',
        'is_send_line',
        'is_send_mail',
	];
}

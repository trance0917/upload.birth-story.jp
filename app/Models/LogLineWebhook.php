<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LogLineWebhook
 * 
 * @property int $log_line_webhook_id
 * @property string $type
 * @property int $mst_maternity_id
 * @property string $line_user_id
 * @property array $api_data
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class LogLineWebhook extends Model
{
	use SoftDeletes;
	protected $table = 'log_line_webhooks';
	protected $primaryKey = 'log_line_webhook_id';

	protected $casts = [
		'mst_maternity_id' => 'int',
		'api_data' => 'json'
	];

	protected $fillable = [
		'type',
		'mst_maternity_id',
		'line_user_id',
		'api_data'
	];
}

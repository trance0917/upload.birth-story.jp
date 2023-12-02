<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MstMaternity
 *
 * @property int $mst_maternity_id
 * @property string $name
 * @property string $line_message_channel_secret
 * @property string $line_message_channel_token
 * @property float $notification_review_score
 * @property float $minimum_review_score
 * @property string $review_link
 * @property string|null $memo
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class MstMaternity extends Model
{
	use SoftDeletes;
	protected $table = 'mst_maternities';
	protected $primaryKey = 'mst_maternity_id';

	protected $casts = [
		'notification_review_score' => 'float',
		'minimum_review_score' => 'float'
	];

	protected $hidden = [
		'line_message_channel_secret',
		'line_message_channel_token'
	];

	protected $fillable = [
		'name',
		'line_message_channel_secret',
		'line_message_channel_token',
		'notification_review_score',
		'minimum_review_score',
		'review_link',
		'memo'
	];

    public function mst_maternity_users()
    {
        return $this->hasMany(MstMaternityUser::class, 'mst_maternity_id', 'mst_maternity_id');
    }
}

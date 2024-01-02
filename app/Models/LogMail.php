<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LogMail
 *
 * @property int $log_mail_id
 * @property string|null $view
 * @property string $from
 * @property string $to
 * @property string|null $cc
 * @property string|null $bcc
 * @property Carbon $created_at
 * @property string|null $subject
 * @property string|null $message
 *
 * @package App\Models
 */
class LogMail extends Model
{
	protected $table = 'log_mails';
	protected $primaryKey = 'log_mail_id';
	public $timestamps = false;

	protected $fillable = [
		'view',
		'from',
		'to',
		'cc',
		'bcc',
		'subject',
		'message'
	];
}

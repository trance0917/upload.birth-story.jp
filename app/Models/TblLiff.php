<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblLiff
 *
 * @property int $tbl_liff_id
 * @property int $mst_maternity_id
 * @property string $line_user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TblLiff extends Model
{
	protected $table = 'tbl_liffs';

	protected $primaryKey = 'tbl_liff_id';

	protected $casts = [
		'mst_maternity_id' => 'int'
	];

	protected $fillable = [
		'mst_maternity_id',
		'line_user_id'
	];

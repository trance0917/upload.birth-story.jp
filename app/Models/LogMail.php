<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



/**
 * App\Models\LogMail
 *
 * @property int $id
 * @property string|null $view
 * @property string $from
 * @property string $to
 * @property string|null $cc
 * @property string|null $bcc
 * @property \Illuminate\Support\Carbon $created_at
 * @property string|null $subject
 * @property string|null $message
 * @property string|null $temp_file
 * @method static \Illuminate\Database\Eloquent\Builder|LogMail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LogMail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LogMail query()
 * @method static \Illuminate\Database\Eloquent\Builder|LogMail whereBcc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogMail whereCc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogMail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogMail whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogMail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogMail whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogMail whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogMail whereTempFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogMail whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogMail whereView($value)
 * @mixin \Eloquent
 */
class LogMail extends Model
{
    use HasFactory;
    const UPDATED_AT = null;
    protected $fillable = ['view','from','to','cc','bcc','subject','message'];
}

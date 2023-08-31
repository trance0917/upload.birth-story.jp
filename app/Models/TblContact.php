<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\TblContact
 *
 * @property int $id
 * @property string $name
 * @property string $mail
 * @property string|null $tel
 * @property string $message
 * @property string|null $ipaddress
 * @property string|null $hostname
 * @property \Illuminate\Support\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|TblContact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TblContact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TblContact query()
 * @method static \Illuminate\Database\Eloquent\Builder|TblContact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TblContact whereHostname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TblContact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TblContact whereIpaddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TblContact whereMail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TblContact whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TblContact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TblContact whereTel($value)
 * @mixin \Eloquent
 */
class TblContact extends Model
{
    use HasFactory;
    const UPDATED_AT = null;
    protected $fillable = ['name','tel','mail','message','ipaddress','hostname'];

    protected $dispatchesEvents = [
        'creating' => \App\Events\IpHostCreating::class,
    ];
}

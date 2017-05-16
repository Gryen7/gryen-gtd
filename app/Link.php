<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Link
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $url
 * @property string $picture
 * @property bool $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Link whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Link whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Link whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Link wherePicture($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Link whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Link whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Link whereUrl($value)
 */
class Link extends Model
{
    protected $fillable = [
        'name',
        'url',
        'pictrue',
        'status'
    ];
}

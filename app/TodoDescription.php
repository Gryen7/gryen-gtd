<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\TodoDescription
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $todo_id
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\TodoDescription whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TodoDescription whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TodoDescription whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TodoDescription whereTodoId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TodoDescription whereUpdatedAt($value)
 */
class TodoDescription extends Eloquent
{
    use SoftDeletes;

    protected $fillable = [
        'todo_id',
        'content',
    ];
}

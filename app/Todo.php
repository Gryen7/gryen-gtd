<?php
/**
 * Created by PhpStorm.
 * User: targaryen
 * Date: 2016/11/18
 * Time: 下午10:59
 */
namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Eloquent
{
    use SoftDeletes;

    protected $fillable = [
        'parents_id',
        'grandparents_id',
        'content',
        'status',
        'begin_at',
        'end_at',
    ];
}
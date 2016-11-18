<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class TodoDescription extends Eloquent
{
    use SoftDeletes;

    protected $fillable = [
        'todo_id',
        'content',
    ];
}

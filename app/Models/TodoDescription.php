<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class TodoDescription extends Eloquent
{
    protected $fillable = [
        'todo_id',
        'content',
    ];
}

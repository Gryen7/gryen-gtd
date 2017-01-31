<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Eloquent
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'description',
        'status',
        'created_at',
        'updated_at'
    ];

    protected $dates = ['deleted_at'];

}

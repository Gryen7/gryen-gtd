<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Eloquent
{
    use SoftDeletes;

    protected $fillable = [
        'article_id',
        'email',
        'name',
        'content'
    ];

    protected $dates = ['deleted_at'];
}

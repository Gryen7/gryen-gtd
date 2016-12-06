<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Eloquent
{
    use SoftDeletes;

    protected $fillable = [
        'article_id',
        'cover',
        'weight',
        'status'
    ];
}

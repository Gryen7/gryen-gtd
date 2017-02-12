<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleData extends Model
{
    protected $fillable = [
        'article_id',
        'content',
    ];

}

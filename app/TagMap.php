<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagMap extends Model
{
    protected $fillable = [
        'tag_id',
        'article_id'
    ];

    public function articleTag()
    {
        $this->belongsTo('App\Article', 'article_id')
            ->belongsTo('App\Tag', 'tag_id');
    }
}

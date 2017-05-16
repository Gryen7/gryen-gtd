<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TagMap
 *
 * @property int $id
 * @property int $tag_id
 * @property int $article_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\TagMap whereArticleId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TagMap whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TagMap whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TagMap whereTagId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TagMap whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TagMap extends Model
{
    protected $fillable = [
        'tag_id',
        'article_id'
    ];

    public function article()
    {
        $this->belongsTo('App\Article', 'article_id');
    }

    public function tag()
    {
        $this->belongsTo('App\Tag', 'tag_id');
    }
}

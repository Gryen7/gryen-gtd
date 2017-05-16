<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * App\Banner
 *
 * @property-read \App\Article $article
 * @mixin \Eloquent
 * @property int $id
 * @property int $article_id
 * @property string $cover
 * @property bool $weight
 * @property bool $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Banner whereArticleId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Banner whereCover($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Banner whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Banner whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Banner whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Banner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Banner whereWeight($value)
 */
class Banner extends Eloquent
{
    protected $fillable = [
        'article_id',
        'cover',
        'weight',
        'status'
    ];

    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}

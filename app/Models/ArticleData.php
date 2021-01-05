<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * \App\Models\ArticleData.
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $article_id
 * @property string $content
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ArticleData whereArticleId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ArticleData whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ArticleData whereId($value)
 */
class ArticleData extends Model
{
    protected $fillable = [
        'article_id',
        'content',
    ];

    public $table = 'article_datas';

    public $timestamps = false;
}

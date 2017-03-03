<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Eloquent
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'tags',
        'cover',
        'status',
        'created_at',
        'updated_at'
    ];

    protected $dates = ['deleted_at'];

    /**
     * 文章内容
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function withContent()
    {
        return $this->hasOne('App\ArticleData');
    }

    /**
     * 文章描述处理
     * @param $articleContent
     * @return string
     */
    public static function descriptionProcess($articleContent)
    {
        return mb_substr(strip_tags($articleContent), 0, 200) . '...';
    }

    /**
     * 从数据库获取文章，标签处理
     * @param $article
     * @return bool
     */
    public static function getTagArray(&$article)
    {
        if (empty($article)) {
            return false;
        }

        if (count($article) === 1) {
            $article->tagArray = explode(',', $article->tags);
        } else {
            foreach ($article as &$value) {
                $value->tags = explode(',', $value->tags);
            }
        }

        return $article;
    }

}

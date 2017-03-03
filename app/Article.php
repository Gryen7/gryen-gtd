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

}

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
        'status'
    ];

    protected $dates = ['deleted_at'];

    /**
     * get article list for control pannel
     * @param $page
     * @return array
     */
    public static function getArticleListForControlPannel($page)
    {
        $take = 10;
        $skip = ($page - 1) * $take;

        $articles = Article::skip($skip)
            ->take($take)
            ->orderBy('created_at', 'desc')
            ->get();

        $pageCount = ceil(Article::all()->count() / $take);
        $prev = $page - 1 > 0 ? $page - 1 : 0;
        $next = $page + 1 <= $pageCount ? $page + 1 : $pageCount;

        return compact('articles', 'prev', 'next', 'pageCount');
    }

}

<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;

class ControlPanelController extends Controller
{
    /**
     * 后台首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('control.index');
    }

    /**
     * 后台文章列表
     *
     * @return mixed
     */
    public function articles($page)
    {
        $take = 10; // 每页文章数目
        $titleLength = 50; // 文章标题截取长度
        $skip = ($page - 1) * $take;

        $articles = Article::skip($skip)
            ->take($take)
            ->get();

        foreach ($articles as &$article) {
            if (mb_strlen($article->title, 'utf-8') > $titleLength) {
                $article->title = mb_substr($article->title, 0, $titleLength, 'utf-8') . '...';
            }
        }

        $pageCount = ceil(Article::all()->count() / $take);
        $prev = $page - 1 > 0 ? $page - 1 : 0;
        $next = $page + 1 <= $pageCount ? $page + 1 : $pageCount;

        return view('control.articles',compact('articles', 'prev', 'next', 'pageCount'));
    }

    public function comments()
    {
        return view('control.comments');
    }

    public function todolist()
    {
        return view('control.todolist');
    }

    public function user()
    {
        return view('control.user');
    }

    public function settings()
    {
        return view('control.settings');
    }

    public function ashcan()
    {
        $articles = Article::onlyTrashed()->get();
        return view('control.ashcan',compact('articles'));
    }
}
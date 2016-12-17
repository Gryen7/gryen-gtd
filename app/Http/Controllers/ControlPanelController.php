<?php

namespace App\Http\Controllers;

use App\Article;
use App\Todo;

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
     * @param $page
     * @return mixed
     */
    public function articles($page = 1)
    {
        return view('control.articles', Article::getArticleListForControlPannel($page));
    }

    public function comments()
    {
        return view('control.comments');
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
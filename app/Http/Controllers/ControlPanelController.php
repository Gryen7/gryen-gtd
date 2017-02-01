<?php

namespace App\Http\Controllers;

use App\Article;

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
     * @return mixed
     * @internal param $page
     */
    public function articles()
    {
        $articles = Article::orderBy('created_at', 'desc')
            -> paginate(15);
        return view('control.articles', compact('articles'));
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
        $articles = Article::onlyTrashed()->paginate(15);
        return view('control.ashcan',compact('articles'));
    }
}
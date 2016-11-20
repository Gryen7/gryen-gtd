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
     * @return mixed
     */
    public function articles($page)
    {
        $take = 10;
        $skip = ($page - 1) * $take;

        $articles = Article::skip($skip)
            ->take($take)
            ->get();

        $pageCount = ceil(Article::all()->count() / $take);
        $prev = $page - 1 > 0 ? $page - 1 : 0;
        $next = $page + 1 <= $pageCount ? $page + 1 : $pageCount;

        return view('control.articles',compact('articles', 'prev', 'next', 'pageCount'));
    }

    public function comments()
    {
        return view('control.comments');
    }

    /**
     * todolist view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function todolist()
    {
        $todos = Todo::all();
        return view('control.todolist', compact('todos'));
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
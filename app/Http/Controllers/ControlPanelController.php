<?php

namespace App\Http\Controllers;

use App\Article;
use App\Todo;

class ControlPanelController extends Controller
{
    /**
     * 后台首页 - 基本信息展示页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('control.index');
    }

    public function me()
    {
        return view('control.me');
    }

    /**
     * todolist view
     * @param $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function todos($page = 1)
    {
        return view('control.todolist', Todo::getTodoListForControlPannel($page));
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

    public function pushToKindle()
    {
        return view('control.push-to-kindle');
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

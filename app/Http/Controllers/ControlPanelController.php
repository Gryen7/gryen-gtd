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
    public function articles()
    {
        $articles = Article::all();
        return view('control.articles',compact('articles'));
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
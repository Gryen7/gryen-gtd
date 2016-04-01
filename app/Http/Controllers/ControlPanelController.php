<?php

namespace App\Http\Controllers;

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

    public function articles()
    {
        return view('control.articles');
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
        return view('control.ashcan');
    }
}
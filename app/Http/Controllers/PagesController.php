<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;

class PagesController extends Controller
{

    /**
     * 首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        $articles = Article::all();
        return view('pages.home', compact('articles'));
    }

    /**
     * 关于本站
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        $name = 'Targaryen';
        return view('pages.about', compact('name'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Banner;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = 'home';
        $banner = Banner::orderByDesc('weight')->first();
        $banner->link = action('ArticlesController@show', ['id' => $banner->article_id]);
        $siteTitle = $banner->article->title;

        return view('home.index', compact('module', 'banner', 'siteTitle'));
    }
}

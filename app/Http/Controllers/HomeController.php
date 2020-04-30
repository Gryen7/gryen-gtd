<?php

namespace App\Http\Controllers;

use App\Article;
use App\Banner;
use Auth;

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
        $banners = Banner::orderByDesc('weight')->get();

        $banners = $banners->map(function ($banner) {
            $banner->href = action('ArticlesController@show', ['id' => $banner->article_id]);
            $banner->articleTitle = $banner->article->title;

            return $banner;
        });

        $viewCount = 0;

        if (Auth::check()) {
            $viewCount = Article::sum('views');
        }

        return view('home.index', compact('module', 'banners', 'viewCount'));
    }

    public function privacyPolicy()
    {
        $module = 'home';

        return view('home.privacy-policy', compact('module'));
    }
}

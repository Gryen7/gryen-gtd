<?php

namespace App\Http\Controllers;

use App\Article;
use App\Banner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = 'home';

        $articles = Article::where('status', '>', 0)
            ->orderBy('created_at', 'desc')
            ->paginate(7);

        $banners = Banner::where('cover', '<>', '')->get();
        foreach ($banners as &$banner) {
            $banner['article_id'] = $banner->article->id;
            $banner['article_title'] = $banner->article->title;
            $banner['article_description'] = $banner->article->description;
        }

        return view('home.index', compact('banners', 'articles', 'module'));
    }

    /**
     * 关于本站
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        $name = 'Targaryen';
        return view('home.about', compact('name'));
    }
}

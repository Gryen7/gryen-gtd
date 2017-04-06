<?php

namespace App\Http\Controllers;

use App\Article;
use App\Banner;
use App\Story;
use App\Word;
use Aws\Waiter;
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

        $banners = Banner::where('cover', '<>', '')->orderBy('id', 'desc')->get();
        foreach ($banners as &$banner) {
            $banner['article_id'] = $banner->article->id;
            $banner['article_title'] = $banner->article->title;
            $banner['article_description'] = $banner->article->description;
        }

        /* 摄影 */
        $photos = Article::where('status', '>', 0)
            ->where('tags', 'like', '%摄影%')
            ->where('cover', '<>', '')
            ->skip(0)
            ->take(12)
            ->get();

        /* 随笔 */
        $notes = Article::where('status', '>', 0)
            ->where('tags', 'like', '%随笔%')
            ->where('cover', '<>', '')
            ->skip(0)
            ->take(8)
            ->get();

        /* 聆听故事 */
        $stories = Story::orderBy('created_at', 'desc')->first();

        /* 致知 */
        $words = Word::orderBy('created_at', 'desc')->first();

        return view('home.index', compact('banners', 'photos', 'notes', 'stories', 'words', 'module'));
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

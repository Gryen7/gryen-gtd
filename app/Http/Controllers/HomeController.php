<?php

namespace App\Http\Controllers;

use App\Article;
use App\Banner;
use App\Story;
use App\Word;

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

        /* 影 */
        $photos = Article::getPhotosForHome();

        /* 志 */
        $notes = Article::getNotesForHome();

        /* 听 */
        $stories = Story::orderBy('created_at', 'desc')->first();

        /* 知 */
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

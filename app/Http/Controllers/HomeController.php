<?php

namespace App\Http\Controllers;

use App\Article;
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

        $banners = Banner::where('cover', '<>', '')
            ->orderBy('weight', 'desc')
            ->orderBy('id', 'desc')
            ->get();
        foreach ($banners as &$banner) {
            $banner['article_id'] = $banner->article->id;
            $banner['article_title'] = $banner->article->title;
            $banner['article_description'] = $banner->article->description;
        }

        /* 影 */
        $photos = Article::getPhotosForHome();

        /* 志 */
        $notes = Article::getNotesForHome();

        return view('home.index', compact('banners', 'photos', 'notes', 'module'));
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

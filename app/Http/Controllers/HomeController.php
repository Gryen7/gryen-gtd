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

        $banners = Banner::where('cover', '<>', '')->get();
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
        $storys = Article::where('status', '>', 0)
            ->where('tags', 'like', '%随笔%')
            ->where('cover', '<>', '')
            ->skip(0)
            ->take(8)
            ->get();

        $arts = (object)[];
        $arts->content = '故事不要多，只要精彩就足够。。。';
        $words = (object)[];
        $words->content = '故事不要多，只要精彩就足够。。。';

        return view('home.index', compact('banners', 'photos', 'storys', 'arts', 'words', 'module'));
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

<?php

namespace App\Http\Controllers\Control;

use App\Article;
use App\Banner;
use App\Config;
use App\Http\Controllers\Controller;
use App\Story;
use App\Word;

class SettingsController extends Controller
{
    /**
     * 站点信息
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function site()
    {
        $config = Config::getAllConfig();
        return view('control.settings.site', compact('config'));
    }

    /**
     * 轮播图设置
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function banners()
    {
        $articles = Article::orderBy('created_at', 'desc')
            -> paginate(15);
        $banners = Banner::where('cover', '<>', '')->get();
        foreach ($banners as &$banner) {
            $banner['article_title'] = $banner->article->title;
        }
        return view('control.settings.banners', compact('articles', 'banners'));
    }

    /**
     * 首页板块设置
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {

        $stories = Story::getStory();
        $words = Word::getWord();
        return view('control.settings.home', compact('stories', 'words'));
    }

}

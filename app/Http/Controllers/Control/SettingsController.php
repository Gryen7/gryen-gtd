<?php

namespace App\Http\Controllers\Control;

use App\Article;
use App\Banner;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{

    public function banners($page = 1)
    {
        $articles = Article::getArticleListForControlPannel($page);
        $banners = Banner::where('cover', '<>', '')->get();
        foreach ($banners as &$banner) {
            $banner['article_title'] = $banner->article->title;
        }
        return view('control.settings.banners', compact('articles', 'banners'));
    }

    public function site()
    {
        return view('control.settings.site');
    }
}

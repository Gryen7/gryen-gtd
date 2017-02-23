<?php

namespace App\Http\Controllers\Control;

use App\Article;
use App\Banner;
use App\Config;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{

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

    public function site()
    {
        $config = Config::getAllConfig();
        return view('control.settings.site', compact('config'));
    }
}

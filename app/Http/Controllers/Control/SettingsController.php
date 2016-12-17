<?php

namespace App\Http\Controllers\Control;

use App\Article;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{

    public function banners($page = 1)
    {
        return view('control.settings.banners', Article::getArticleListForControlPannel($page));
    }

    public function imageQuality()
    {
        return view('control.settings.image-quality');
    }
}

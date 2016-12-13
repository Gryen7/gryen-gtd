<?php

namespace App\Http\Controllers;

use App\Article;

class BannersController extends Controller
{
    public function setting($page = 1)
    {
        return view('control.setting.banners', Article::getArticleListForControlPannel($page));
    }
}

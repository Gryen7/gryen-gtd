<?php

namespace App\Http\Controllers\Control;

use App\Article;
use App\Http\Controllers\Controller;

class BannersController extends Controller
{
    public function setting($page = 1)
    {
        return view('control.setting.banners', Article::getArticleListForControlPannel($page));
    }
}

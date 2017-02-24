<?php

namespace App\Http\Controllers\Control;

use App\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function title(Request $request)
    {
        return Config::setSiteTitle($request->get('title'));
    }

    public function subTitle(Request $request)
    {
        return Config::setSiteSubTitle($request->get('sub_title'));
    }
}

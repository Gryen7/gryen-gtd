<?php

namespace App\Http\Controllers\Control;

use App\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    /**
     * 设置站点标题
     * @param Request $request
     * @return mixed
     */
    public function title(Request $request)
    {
        return Config::setSiteTitle($request->get('title'));
    }

    /**
     * 设置站点副标题
     * @param Request $request
     * @return mixed
     */
    public function subTitle(Request $request)
    {
        return Config::setSiteSubTitle($request->get('sub_title'));
    }

    /**
     * 设置站点关键字
     * @param Request $request
     * @return mixed
     */
    public function keywords(Request $request)
    {
        return Config::setSiteKeywords($request->get('keywords'));
    }

    /**
     * 设置站点描述
     * @param Request $request
     * @return mixed
     */
    public function description(Request $request)
    {
        return Config::setSiteDescription($request->get('description'));
    }
}

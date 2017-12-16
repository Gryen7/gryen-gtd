<?php

namespace App\Http\Controllers\Control;

use App\Analytics;
use App\Config;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddAnalyticsRequest;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * 设置站点标题
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function title(Request $request)
    {
        return Config::setSiteTitle($request->get('title'));
    }

    /**
     * 设置站点副标题
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function subTitle(Request $request)
    {
        return Config::setSiteSubTitle($request->get('sub_title'));
    }

    /**
     * 设置站点关键字
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function keywords(Request $request)
    {
        return Config::setSiteKeywords($request->get('keywords'));
    }

    /**
     * 设置站点描述
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function description(Request $request)
    {
        return Config::setSiteDescription($request->get('description'));
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function defaultImage(Request $request)
    {
        return Config::setSiteDefaultImage($request->get('default_image'));
    }

    /**
     * 添加分析代码请求处理
     * @param AddAnalyticsRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addAnalyticsCode(AddAnalyticsRequest $request)
    {
        Analytics::addAnalyticsCode($request->all());
        return redirect($_SERVER['HTTP_REFERER']);
    }

    public function delAnalyticsCode(Request $request)
    {
        Analytics::destroy($request->id);
        return response()->json([
            'code' => 200,
            'message' => '删除成功',
            'type' => 'success',
            'href' => $_SERVER['HTTP_REFERER']
        ]);
    }
}

<?php

namespace App\Http\Controllers\Control;

use App\Banner;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBannerRequest;

class BannersController extends Controller
{
    public function set(CreateBannerRequest $request)
    {
        // 是否超出允许的 banner 数量
        $count = Banner::all()->count();
        if ($count >= 5) {
            return response()->json([
                'code' => 403,
                'msg' => 'The maximum number of settings has been exceeded'
            ]);
        }

        // 是否已经设置过了
        $isSet = Banner::where('article_id', $request->get('article_id'))->get()->count();

        if ($isSet) {
            return response()->json([
                'code' => 403,
                'msg' => 'This article has been set up for banner'
            ]);
        }

        Banner::create($request->all());
        return response()->json([
            'code' => 200,
            'msg' => 'success'
        ]);
    }
}

<?php

namespace App\Http\Controllers\Control;

use App\Banner;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBannerRequest;

class BannersController extends Controller
{
    /**
     * 设置 Banner
     * @param CreateBannerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function set(CreateBannerRequest $request)
    {
        // 是否超出允许的 banner 数量
        $count = Banner::all()->count();
        if ($count >= 5) {
            return response()->json([
                'code' => 403,
                'msg' => '超出了首页推荐的可设置数量'
            ]);
        }

        // 是否已经设置过了
        $isSet = Banner::where('article_id', $request->get('article_id'))->get()->count();

        if ($isSet) {
            return response()->json([
                'code' => 403,
                'msg' => '已经是首页推荐文章了'
            ]);
        }

        Banner::create($request->all());
        return response()->json([
            'code' => 200,
            'msg' => 'success'
        ]);
    }

    /**
     * 删除 bannder
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @internal param Request $request
     * @internal param $id
     */
    public function delete($id)
    {
        Banner::destroy($id);
        return response()->json([
            'code' => 200,
            'msg' => 'success'
        ]);
    }

    public function top($id)
    {
        $banner = Banner::find($id);
        $msg = $banner->update(['weight' => Banner::max('weight') + 1]);
        return response()->json([
            'code' => 200,
            'msg' => $msg
        ]);
    }
}

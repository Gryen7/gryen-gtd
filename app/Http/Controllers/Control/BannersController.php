<?php

namespace App\Http\Controllers\Control;

use App\Banner;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBannerRequest;

class BannersController extends Controller
{
    public function set(CreateBannerRequest $request)
    {
        Banner::create($request->all());
        return response()->json([
            'code' => 200,
            'msg' => 'success'
        ]);
    }
}

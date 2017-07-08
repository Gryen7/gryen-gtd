<?php

namespace App\Http\Controllers\Api;

use App\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomesController extends Controller
{
    public function getFullScreenImgs(Request $request)
    {
        $banners = Banner::orderByDesc('weight')->get();
        foreach ($banners as &$banner) {
            $banner->title = $banner->article->title;
            $banner->link = action('ArticlesController@show', $banner->article->id);
            $banner->description = $banner->article->description;
            $banner->cover = imageView2($banner->cover, [
                'w' => $request->get('width'),
                'h' => $request->get('height')
            ]);
        }
        return $banners;
    }
}

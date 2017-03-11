<?php

namespace App\Http\Controllers\Control;

use App\Story;
use App\Word;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * 更新致知
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function word(Request $request)
    {
        Word::create($request->all());
        return redirect($_SERVER['HTTP_REFERER']);
    }


    /**
     * 聆听故事更新
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function story(Request $request)
    {
        Story::create($request->all());
        return redirect($_SERVER['HTTP_REFERER']);
    }
}
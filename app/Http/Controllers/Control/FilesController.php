<?php

namespace App\Http\Controllers\Control;

use App\File;
use App\Http\Controllers\Controller;

class FilesController extends Controller
{
    /**
     * 图片列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('control.files', compact('files'));
    }

    /**
     * 图片列表
     * @param int $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getImageList($page = 1)
    {
        $files = File::List('', $page);
        return view('control.files.list', compact('files'));
    }
}

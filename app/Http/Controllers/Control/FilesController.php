<?php

namespace App\Http\Controllers\Control;

use App\Http\Controllers\Controller;

class FilesController extends Controller
{
    /**
     * 文件列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('control.files');
    }
}

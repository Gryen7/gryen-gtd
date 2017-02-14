<?php

namespace App\Http\Controllers;

use App\Upload;
use Illuminate\Support\Facades\Input;

class FilesController extends Controller
{
    /**
     * 上传图片
     * @return array
     * @internal param null $File
     * @internal param bool $fromServer
     * @internal param Request $request
     */
    public function upload()
    {
        $File = Input::file('upload_file');
        return Upload::upload($File);
    }

}

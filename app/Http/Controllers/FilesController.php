<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Support\Facades\Input;

class FilesController extends Controller
{
    /**
     * 上传图片.
     * @return array
     * @internal param null $File
     * @internal param bool $fromServer
     * @internal param Request $request
     */
    public function upload()
    {
        $File = Input::file('upload_file');

        return File::upload($File);
    }
}

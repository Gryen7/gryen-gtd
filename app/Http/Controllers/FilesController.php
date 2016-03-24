<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function upload(Request $request)
    {
        $disk = \Storage::disk('qiniu');
        $results = $disk->put(time() . '.jpg', $request->upload_file);
        dd($results);
        return true;
    }
}

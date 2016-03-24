<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

class FilesController extends Controller
{
    public function upload(Request $request)
    {



        // 构建 UploadManager 对象
        $uploadMgr = new UploadManager();

        $filePath = $request->upload_file;

        $key = time().'.jpg';

        list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);

        $returnData = array();

        if ($err !== null) {
            $returnData['success'] = false;
            $returnData['msg'] = $err;
            $returnData['file_path'] = null;
        } else {
            $returnData['success'] = true;
            $returnData['msg'] = $ret['hash'];
            $returnData['file_path'] = 'http://7xnswo.com1.z0.glb.clouddn.com/' . $ret['key'];
        }
        return \Response::json(json_encode($returnData));
    }
}

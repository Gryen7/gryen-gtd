<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

class FilesController extends Controller
{
    public function upload(Request $request)
    {
        // 用于签名的公钥和私钥
        $accessKey = 'yixfY9dshvT9BUJOSSfj01BU4HB6fklOJnhAYfZT';
        $secretKey = 'cT6RKtj8tkGuegqgpfEXhUb6rXJa7iAcX8ijV0Cp';

        // 初始化签权对象
        $auth = new Auth($accessKey,$secretKey);

        // 空间名  http://developer.qiniu.com/docs/v6/api/overview/concepts.html#bucket
        $bucket = 'targaryen-top';

        // 生成上传Token
        $token = $auth->uploadToken($bucket);

        // 构建 UploadManager 对象
        $uploadMgr = new UploadManager();

        $filePath = $request->upload_file;

        $key = Carbon::now()->toW3cString().'.jpg';

        list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);

        if ($err !== null) {
            dd($err);
        } else {
            dd($ret);
        }
    }
}

<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function upload(Request $request)
    {
        $disk = \Storage::disk('qiniu');
        $fileType = $this->getFilePostfix(getimagesize($request->upload_file)['mime']);
        if ($fileType == 'type_error') {
            return $this->returnResults(null, '非法文件类型！', false);
        }
        $results = $disk->put(md5(time()) . $fileType, file_get_contents($request->upload_file));
        if ($results) {
            return $this->returnResults('');
        } else {
            return $this->returnResults(null, 'error!', false);
        }
    }

    public function returnResults($file_path = '', $msg = 'success!', $success = true)
    {
        return [
            'success' => $success,
            'msg' => $msg,
            'file_path' => $file_path,
        ];
    }

    public function getFilePostfix($type)
    {
        switch ($type) {
            case 'image/jpeg':
                return '.jpg';
                break;
            case 'image/png':
                return '.png';
                break;
            case 'image/gif':
                return '.gif';
                break;
            default:
                return 'type_error';
                break;
        }
    }
}

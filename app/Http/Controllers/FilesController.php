<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    protected static $UPLOAD_PATH = '/uploads';

    /**
     * 上传图片
     *
     * @param Request $request
     * @return array
     */
    public function upload(Request $request)
    {
        $disk = \Storage::disk('qiniu');
        $fileType = $this->getFilePostfix(getimagesize($request->upload_file)['mime']);
        if ($fileType == 'type_error') {
            return $this->returnResults(null, '非法文件类型！', false);
        }
        $filePath = self::$UPLOAD_PATH . '/' . Carbon::now()->toDateString() . '/' . md5(Carbon::now()->timestamp) . $fileType;
        $results = $disk->put($filePath, file_get_contents($request->upload_file));
        if ($results) {
            return $this->returnResults(\Config::get('filesystems.disks.qiniu.domains.default') . $filePath);
        } else {
            return $this->returnResults(null, 'error!', false);
        }
    }

    /**
     * 处理返回信息
     *
     * @param string $file_path
     * @param string $msg
     * @param bool $success
     * @return array
     */
    private function returnResults($file_path = '', $msg = 'success!', $success = true)
    {
        return [
            'file_path' => $file_path,
            'msg' => $msg,
            'success' => $success,
        ];
    }

    /**
     * 获取文件后悔
     *
     * @param $type
     * @return string
     */
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

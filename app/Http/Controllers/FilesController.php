<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class FilesController extends Controller
{
    protected static $UPLOAD_PATH = '/uploads';

    /* 允许上传的文件类型 */
    protected static $ALLOW_FILE_TYPE = [
        'image/jpeg',
        'image/png',
        'image/gif'
    ];

    /* 服务器端的文件路径 */
    protected static $FILE_RETURN_PATH = [
        'local' => 'filesystems.disks.local.root',
        'public' => 'filesystems.disks.public.root',
        's3' => 'filesystems.disks.s3.region' . '/' . 'filesystems.disks.s3.bucket',
        'qiniu' => 'filesystems.disks.qiniu.domains.default',
    ];

    /**
     * 上传图片
     * @return array
     * @internal param Request $request
     */
    public function upload()
    {
        $Disk = \Storage::disk(env('DISK'));
        $File = Input::file('upload_file');

        if (!$File->getMimeType() || !in_array($File->getMimeType(), self::$ALLOW_FILE_TYPE)) {
            return $this->returnResults(null, 'error file type！', false);
        }

        $fileType = $File->getClientOriginalExtension();
        $filePath = self::$UPLOAD_PATH . '/' . Carbon::now()->toDateString() . '/' . md5(Carbon::now()->timestamp) . '.' . $fileType;

        $results = $Disk->put($filePath, file_get_contents($File));

        if ($results) {
            return $this->returnResults('//' . \Config::get(self::$FILE_RETURN_PATH[env('DISK')]) . $filePath);
        } else {
            return $this->returnResults(null, 'error!', false);
        }
    }

    /**
     * 处理返回信息，兼容 simditor
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
}

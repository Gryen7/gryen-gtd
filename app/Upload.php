<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\File;

class Upload extends Model
{
    protected $fillable = [
        'table',
        'id_in_table',
        'url',
        'status'
    ];

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
     * 处理返回信息，兼容 simditor
     *
     * @param string $file_path
     * @param string $msg
     * @param bool $success
     * @return array
     */
    private static function returnResults($file_path = '', $msg = 'success!', $success = true)
    {
        return [
            'file_path' => $file_path,
            'msg' => $msg,
            'success' => $success,
        ];
    }


    /**
     * 上传图片
     * @param $File
     * @return array
     * @internal param bool $fromServer
     * @internal param Request $request
     */
    public static function upload($File = null)
    {
        $Disk = \Storage::disk(env('DISK'));

        if (!$File) {
            return self::returnResults(null, 'error!', false);
        }

        if (!$File->getMimeType() || !in_array($File->getMimeType(), self::$ALLOW_FILE_TYPE)) {
            return self::returnResults(null, 'error file type！', false);
        }

        $fileType = $File->getClientOriginalExtension();
        $filePath = self::$UPLOAD_PATH . '/' . Carbon::now()->toDateString() . '/' . md5(Carbon::now()->timestamp) . '.' . $fileType;

        $results = $Disk->put($filePath, file_get_contents($File));

        if ($results) {
            return self::returnResults('//' . \Config::get(self::$FILE_RETURN_PATH[env('DISK')]) . $filePath);
        } else {
            return self::returnResults(null, 'error!', false);
        }
    }
}

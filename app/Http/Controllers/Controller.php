<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 异步请求，json 结果处理.
     * @param $code
     * @param $msg
     * @param mixed $data
     * @return array
     */
    public function jsonResult($code, $msg, mixed $data = null)
    {
        return [
            'code' => $code,
            'msg' => $msg,
            'data' => $data,
        ];
    }
}

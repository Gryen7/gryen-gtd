<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class NoticesController extends Controller
{
    public function wechat()
    {
        return response()->isOk();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BannersController extends Controller
{
    public function setting()
    {
        return view('control.setting.banners');
    }
}

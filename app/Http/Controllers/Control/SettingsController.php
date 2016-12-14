<?php

namespace App\Http\Controllers\Control;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function imageQuality()
    {
        return view('control.setting.image-quality');
    }
}

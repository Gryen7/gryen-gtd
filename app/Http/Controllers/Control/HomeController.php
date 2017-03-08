<?php

namespace App\Http\Controllers\Control;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function word(Request $request)
    {
        return $request;
    }
}

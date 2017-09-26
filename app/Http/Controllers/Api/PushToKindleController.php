<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PushToKindleController extends Controller
{
    public function index(Request $request)
    {
        return response()->json($request->all());
    }
}

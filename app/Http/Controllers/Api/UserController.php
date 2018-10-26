<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * 无状态登录
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $content = [
            'status' => 'fail',
        ];
        $status = 200;
        $credentials = [
            'email' => $request->get('username'),
            'password' => $request->get('password')
        ];

        if ($token = \JWTAuth::attempt($credentials)) {
            $content = [
                'token' => 'bearer ' . $token,
                'status' => 'ok',
                'currentAuthority' => 'admin',
            ];
        } else {
            $status = 401;
        }

        return response($content, $status);
    }
}

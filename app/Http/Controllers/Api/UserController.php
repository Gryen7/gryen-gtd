<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * 无状态登录.
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
            'password' => $request->get('password'),
        ];

        if ($token = \JWTAuth::attempt($credentials)) {
            $content = [
                'token' => 'bearer '.$token,
                'status' => 'ok',
                'currentAuthority' => 'admin',
            ];
        } else {
            $status = 401;
        }

        return response($content, $status);
    }

    public function currentUser(Request $request)
    {
        $currentUser = $request->user('api');

        if (! empty($currentUser)) {
            $currentUser->avatar = 'https://gw.alipayobjects.com/zos/rmsportal/BiazfanxmamNRoxxVxka.png';
        }

        return $currentUser;
    }
}

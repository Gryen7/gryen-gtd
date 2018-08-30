<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\UnauthorizedException;
use App\Traits\AuthProxy;

class UserController extends Controller
{
    use AuthProxy;

    public function login(Request $request)
    {
        $user = User::where('email', $request->get('userName'))->first();

        if (!$user) {
            throw new UnauthorizedException('用户不存在');
        }

        $tokens = $this->authenticate();

        return response()->json([
            'token' => $tokens,
            'user' => $user,
            'status' => 'ok',
            'currentAuthority' => 'admin'
        ]);
    }
}

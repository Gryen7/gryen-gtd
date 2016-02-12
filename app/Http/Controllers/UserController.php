<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;

class UserController extends AuthController
{

    /**
     * 后台首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * 后台用户登录
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view('user.login');
    }

    /**
     * 用户登录处理
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleLogin(Request $request)
    {
        $is_remember = false;
//        dd($request->all());
        // 下次是否自动登录
        if ($request->has('is_remember')) {
            $is_remember = true;
        }
        if (!\Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')], $is_remember)) {
            return redirect('error');
        }
        return redirect('user/index');
    }

    /**
     * 用户注册
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register()
    {
        return view('user.register');
    }

    /**
     * 用户注册处理
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleRegister(Request $request)
    {
        if (!$this->create($request->all())) {
            return redirect('error');
        };
        return redirect('user/login');
    }

}

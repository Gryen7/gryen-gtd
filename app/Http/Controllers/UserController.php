<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthController;
use App\User;
use Illuminate\Http\Request;

class UserController extends AuthController
{

    /**
     * 后台用户登录
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login(Request $request)
    {
        $previous = $request->session()->get('_previous')['url'];
        return view('user.login', compact('previous'));
    }

    /**
     * 用户登录处理
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleLogin(Request $request)
    {
        $is_remember = false;
        // 下次是否自动登录
        if ($request->has('is_remember')) {
            $is_remember = true;
        }
        if (!\Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')], $is_remember)) {
            return redirect('error');
        }
        return redirect($request->get('previous'));
    }

    /**
     * 用户注册
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(Request $request)
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
        if (User::all()->count() >= 1) {
            return redirect('error');
        }
        if (!$this->create($request->all())) {
            return redirect('error');
        };
        return redirect('user/login');
    }

    /**
     * @return mixed
     */
    public function logout()
    {
        \Auth::logout();
        return redirect('/home');
    }

}

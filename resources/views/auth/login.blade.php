@extends('layouts._default') @section('content')
<div class="mx-auto max-w-xs">
    <div class="h-8 leading-8 border-l-8 border-red-500 pl-1">登录</div>

    <div class="p-3">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="">邮箱</label>

                <div class="">
                    <input id="email" type="email"
                        class="focus:shadow-none focus:outline-none focus:border-red-500 border-b-2 w-full h-8 @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="password" class="">密码</label>

                <div class="">
                    <input id="password" type="password"
                        class="focus:shadow-none focus:outline-none focus:border-red-500 border-b-2 w-full h-8 @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end items-center mb-4">
                <input class="mr-1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : ''
                    }}>
                <label class="" for="remember">
                    记住我
                </label>
            </div>

            <div class="">
                <button type="submit" class="rounded bg-red-500 text-white px-4 py-2 mr-2">
                    登录
                </button>

                @if (Route::has('password.request'))
                <a class="" href="{{ route('password.request') }}">
                    忘记密码？
                </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection

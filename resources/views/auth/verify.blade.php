@extends('layouts._default')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card t-auth-card">
            <div class="card-header">{{ __('auth.Verify Your Email Address') }}</div>

            <div class="card-body">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('auth.A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                {{ __('auth.Before proceeding, please check your email for a verification link.') }}
                {{ __('auth.If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('auth.click here to request another') }}</a>.
            </div>
        </div>
    </div>
</div>
@endsection

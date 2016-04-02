@extends('layouts._base')
@section('base_content')
    @parent
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-1 tar-cp-nav text-center">
            @include('control._nav')
        </div>
        <div class="col-xs-11">
            <div>Control Panel</div>
            <hr>
            <div class="navbar navbar-default">
                <div class="container-fluid">
                    @yield('subNavigation')
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    @yield('content')
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
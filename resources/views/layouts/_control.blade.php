@extends('layouts._base')
@section('base_content')
    @parent
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-2 tar-cp-nav">
                @include('control._nav')
            </div>
            <div class="col-xs-10">
                @include('control._top')
                <hr style="margin: 5px auto">
                <div class="navbar navbar-default">
                    <div class="container-fluid">
                        @yield('subNavigation')
                    </div>
                </div>
                <div class="container-fluid tar-cp-main">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@include('common._modal')
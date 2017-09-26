@extends('layouts._base-control')
@section('base_content')
    @parent
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-1 tar-cp-nav">
                @include('control._nav')
            </div>
            <div class="col-xs-1">
            </div>
            <div class="col-xs-11">
                @include('control._top')
                <hr style="margin: 0.5rem auto">
                @include('control._content-nav')
                <div class="container-fluid tar-cp-main">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('errors._list')
@endsection
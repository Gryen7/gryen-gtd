@extends('layouts._base')
@section('base_content')
    @parent
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-2 tar-cp-nav">
                @include('control._nav')
            </div>
            <div class="col-xs-10">
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
    {!! Html::script(asset('js/control.js')) !!}
@endsection
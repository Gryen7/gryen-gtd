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
                <div class="navbar navbar-default tar-ctl-navbar">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse">
                            <form class="navbar-form navbar-left">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="关键词">
                                </div>
                                <button type="submit" class="btn btn-default">搜索</button>
                            </form>
                            <div class="navbar-right">
                                @yield('subNavigation')
                                <a class="btn btn-default navbar-btn" onMouseOver="$(this).tooltip('show')" data-toggle="tooltip" data-placement="top" title="文件管理" href="{{ action('Control\FilesController@index') }}">
                                    <span class="glyphicon glyphicon-hdd"></span>
                                </a>
                            </div>
                        </div>
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
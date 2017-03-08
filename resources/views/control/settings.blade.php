@extends('layouts._control', ['module' => 'control'])
@section('subNavigation')
    <form class="navbar-form navbar-left">
        <div class="btn-group">
            <a href="{{action('Control\SettingsController@site')}}" class="btn btn-default">站点设置</a>
            <a href="{{action('Control\SettingsController@banners')}}" class="btn btn-default">首页推荐</a>
            <a href="{{action('Control\SettingsController@word')}}" class="btn btn-default">致 · 知</a>
        </div>
    </form>
@stop
@section('content')
@stop
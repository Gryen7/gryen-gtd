@extends('layouts._control', ['module' => 'control'])
@section('subNavigation')
    <div class="btn-group">
        <a href="{{action('Control\SettingsController@site')}}" class="btn btn-default">站点设置</a>
        <a href="{{action('Control\SettingsController@banners')}}" class="btn btn-default">首页推荐</a>
    </div>
@stop
@section('content')
@stop
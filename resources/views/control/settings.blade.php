@extends('layouts._control', ['module' => 'control'])
@section('content')
<ul class="list-group col-xs-6">
    <li class="list-group-item">
        <a href="{{action('Control\SettingsController@banners')}}">首页推荐</a>
    </li>
    <li class="list-group-item">
        <a href="{{ action('Control\FilesController@index') }}">文件管理</a>
    </li>
    <li class="list-group-item">
        <a href="{{action('Control\SettingsController@site')}}">站点设置</a>
    </li>
</ul>
@stop
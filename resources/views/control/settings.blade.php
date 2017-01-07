@extends('layouts._control', ['module' => 'control'])
@section('subNavigation')
    <form class="navbar-form navbar-left">
        <div class="btn-group">
            <a href="{{action('Control\SettingsController@site')}}" class="btn btn-default">Site Setting</a>
            <a href="{{action('Control\SettingsController@banners')}}" class="btn btn-default">Banner Setting</a>
        </div>
    </form>
@stop
@section('content')
@stop
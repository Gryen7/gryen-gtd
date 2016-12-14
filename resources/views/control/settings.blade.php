@extends('layouts._control', ['module' => 'control'])
@section('subNavigation')
    <form class="navbar-form navbar-left">
        <div class="btn-group">
            <a href="{{action('Control\BannersController@setting')}}" class="btn btn-default">Banner Setting</a>
            <a href="{{action('Control\SettingsController@imageQuality')}}" class="btn btn-default">Image Quality Setting</a>
        </div>
    </form>
@stop
@section('content')
@stop
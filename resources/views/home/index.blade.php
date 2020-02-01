@extends('layouts._default', [
    'siteTitle' => '封面',
    'module' => 'home',
    'noJsLoad' => true,
    'vue' => true
])
@section('content')
    <div class="row t-min-height-100">
        @include('home._carousel')
        @include('home._sidebar')
    </div>
@stop

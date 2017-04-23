@extends('layouts._base', ['module' => 'home'])
@section('base_content')
    @parent
    @include('common._nav', ['extraClass' => ''])

    @if(count($banners) > 0)
        @include('home._banner')
    @endif

    @if(count($photos) > 0)
        @include('home._photo')
    @endif

    @if(count($notes) > 0)
        @include('home._notes')
    @endif
@endsection
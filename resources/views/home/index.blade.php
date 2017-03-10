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

    @if(!empty($arts))
        @include('home._art')
    @endif

    @if(count($storys) > 0)
        @include('home._note')
    @endif

    @if(!empty($words))
        @include('home._word')
    @endif
@endsection
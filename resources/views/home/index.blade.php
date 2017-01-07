@extends('layouts._base', ['module' => 'home'])
@section('base_content')
    @parent
    @include('common._nav', ['extraClass' => 'indxNavMrgnBtm'])
    <div class="tar-index-slider">
        <ul class="swiper-wrapper">
            @foreach($banners as $banner)
            <li class="swiper-slide">
                <img src="{{ $banner->cover }}?imageView2/1/w/960/h/400" alt="" data-swiper-parallax="0">
                <div class="tar-slider-cover" data-swiper-parallax="35%">
                    <a href="">{{ $banner->article_title }}</a>
                    <div class="tar-slider-desc">{{ $banner->article_description }}</div>
                </div>
            </li>
                @endforeach
        </ul>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @include('articles._list')
            </div>
            @include('common._sidebar')
        </div>
    </div>
@endsection
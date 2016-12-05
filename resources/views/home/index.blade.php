@extends('layouts._base', ['module' => 'home'])
@section('base_content')
    @parent
    @include('common._nav', ['extraClass' => 'indxNavMrgnBtm'])
    <div class="tar-index-slider">
        <ul class="swiper-wrapper">
            <li class="swiper-slide">
                <img src="http://7xnswo.com1.z0.glb.clouddn.com/uploads/2016-11-12/0ed742a6f8a3d58f87cfa5ca74a56afc.jpg?imageView2/1/w/960/h/400" alt="" data-swiper-parallax="0">
                <div class="tar-slider-cover" data-swiper-parallax="35%">
                    <a href="">这是标题</a>
                    <div>这是描述</div>
                </div>
            </li>
            <li class="swiper-slide">
               <img src="http://7xnswo.com1.z0.glb.clouddn.com/uploads/2016-11-12/72e32911c86d61ee388e6349941b48f9.jpg?imageView2/1/w/960/h/400" alt="" data-swiper-parallax="0">
                <div class="tar-slider-cover" data-swiper-parallax="35%">
                    <a href="">这是标题</a>
                    <div>这是描述</div>
                </div>
            </li>
            <li class="swiper-slide">
                <img src="http://7xnswo.com1.z0.glb.clouddn.com/uploads/2016-11-12/5d0bf6afb7a25e047615b2a0a09715f1.jpg?imageView2/1/w/960/h/400" alt="" data-swiper-parallax="0">
                <div class="tar-slider-cover" data-swiper-parallax="35%">
                    <a href="">这是标题</a>
                    <div>这是描述</div>
                </div>
            </li>
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
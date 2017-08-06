@extends('layouts._base', [
    'module' => 'home'
])
@section('base_content')
    @parent
    @include('common._nav')
    <div class="t-wrap">
        <section class="home-main">
            <a href="{{ $banner->link }}">
                <div class="focus-cover">
                    <img src="{{ $banner->cover }}" alt="">
                    <p class="title text-center">{{ $banner->title }}</p>
                    <div class="description">
                        {{ $banner->description }}
                    </div>
                </div>
            </a>
            <div class="slogan hidden-xs">与其波流茅靡，不如从容燃烧。</div>
        </section>
    </div>
@endsection
@extends('layouts._base', [
    'module' => 'home'
])
@section('base_content')
    @parent
    @include('common._nav')
    <div class="t-wrap">
        <div class="home-main">
            <a href="{{ $banner->link }}"><img src="{{ $banner->cover }}" alt=""></a>
            <div class="slogan">与其波流茅靡，不如从容燃烧。</div>
        </div>
    </div>
@endsection
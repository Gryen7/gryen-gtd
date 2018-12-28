@extends('layouts._base', [
    'module' => 'home'
])
@section('base_content')
    @parent
    @include('common._nav')
    <div>
        <section class="home-main">
            <div class="slogan hidden-xs">与其波流茅靡，不如从容燃烧。</div>
        </section>
    </div>
@endsection

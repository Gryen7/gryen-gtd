@extends('layouts._base', [
    'module' => 'home',
    'vue' => true
])
@section('base_content')
    @parent
    @include('common._nav')
    <div class="t-wrap" id="gryenApp">
        <div class="t-main">
            <full-screen-img></full-screen-img>
        </div>
    </div>
@endsection
@extends('layouts._base')
@section('base_content')
    @parent
@include('common._nav', ['extraClass' => ''])
<div class="container t-wrap" id="gryenApp">
    <div class="row t-main">
        @yield('content')
    </div>
</div>
@include('errors._list')
@endsection
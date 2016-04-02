@extends('layouts._base')
@section('base_content')
    @parent
@include('pages._nav')
<div class="container">
    <div class="row">
        @yield('content')
    </div>
</div>
@include('errors._list')
@endsection
@extends('layouts._base')
@section('base_content')
    @parent
@include('common._nav', ['extraClass' => ''])
<div class="container-fluid">
    <div class="row">
        @yield('content')
    </div>
</div>
@include('errors._list')
@endsection
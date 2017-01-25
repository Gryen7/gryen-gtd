@extends('layouts._default', ['module' => 'article'])
@section('content')
    <div class="col-md-8">
        @include('articles._list')
    </div>
    @include('common._sidebar')
@stop
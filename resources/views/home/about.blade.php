@extends('layouts._default', ['module' => 'about'])
@section('content')
    <div class="col-md-8">
        <h1>About:{{$name}}</h1>
    </div>
    @include('common._sidebar')
@stop
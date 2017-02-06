@extends('layouts._default', ['module' => 'article'])
@section('content')
    <div class="tar-article-form">
        {!! Form::open(['action' => 'ArticlesController@store']) !!}
        {!! Form::input('hidden','status',0) !!}
        @include('articles._form')
        {!! Form::close() !!}
    </div>
@stop
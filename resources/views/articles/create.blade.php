@extends('layouts._default', ['module' => 'article-edit'])
@section('content')
    <div class="tar-article-form">
        {!! Form::open(['action' => 'ArticlesController@store', 'enctype' => 'multipart/form-data']) !!}
        @include('articles._form')
        {!! Form::close() !!}
    </div>
@stop
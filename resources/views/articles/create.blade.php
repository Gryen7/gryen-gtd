@extends('layouts.default')
@section('content')
    <h1>Create a New Article</h1>
    <hr>
    {!! Form::open(['action' => 'ArticlesController@store']) !!}
    @include('articles._form' , ['submitButtonText' => 'Add Article'])
    {!! Form::close() !!}
    @include('errors.list')

    <script type="text/javascript" src="/vendor/js/simditor.js"></script>
    <script type="text/javascript" src="/vendor/js/simditor-markdown.js"></script>
    <script type="text/javascript" src="/js/article.js"></script>
@stop
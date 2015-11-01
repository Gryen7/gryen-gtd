@extends('layouts.default')
@section('content')
    <h1>Edit Article</h1>
    <hr>
    <h2>Edit:{{ $article->title }}</h2>
    {!! Form::model($article , ['method' => 'PATCH' , 'action' => ['ArticlesController@update' , $article->id]]) !!}
    @include('articles._form' , ['submitButtonText' => 'Update Article'])
    {!! Form::close() !!}
    @include('errors.list')
@stop
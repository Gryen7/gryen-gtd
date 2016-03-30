@extends('layouts.default')
@section('content')
    {!! Form::model($article , ['method' => 'POST' , 'action' => ['ArticlesController@update' , $article->id]]) !!}
    @include('articles._form' , ['submitButtonText' => 'Update Article'])
    {!! Form::close() !!}
@stop
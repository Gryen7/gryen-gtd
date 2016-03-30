@extends('layouts.default')
@section('content')
    <h1>Create a New Article</h1>
    <hr>
    {!! Form::open(['action' => 'ArticlesController@store']) !!}
    @include('articles._form' , ['submitButtonText' => 'Add Article'])
    {!! Form::close() !!}
    @include('errors.list')
@stop
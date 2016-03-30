@extends('layouts.default')
@section('content')
    {!! Form::open(['action' => 'ArticlesController@store']) !!}
    @include('articles._form' , ['submitButtonText' => 'Add Article'])
    {!! Form::close() !!}
@stop
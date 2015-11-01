@extends('layouts.default')
@section('content')
    <h1>Edit Article</h1>
    <hr>
    <h2>Edit:{{ $article->title }}</h2>
    {!! Form::model($article , ['method' => 'PATCH' , 'action' => ['ArticlesController@update' , $article->id]]) !!}
    <div class="form-group">
        {!! Form::label('title','Title:') !!}
        {!! Form::text('title',null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content','Content:') !!}
        {!! Form::textarea('content',null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description','Description:') !!}
        {!! Form::textarea('description',null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Add Article',['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@stop
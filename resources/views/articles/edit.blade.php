@extends('layouts._default', ['module' => 'article'])
@section('content')
    <div class="tar-article-form">
    {!! Form::model($article , ['method' => 'POST' , 'action' => ['ArticlesController@update' , $article->id]]) !!}
    {!! Form::input('hidden','status',0) !!}
    @include('articles._form' , ['submitButtonText' => 'Submit','submitButtonText2' => 'Save'])
    {!! Form::close() !!}
    </div>
@stop
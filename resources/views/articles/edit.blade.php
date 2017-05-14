@extends('layouts._default', ['module' => 'article-edit'])
@section('content')
    <div class="tar-article-form">
    {!! Form::model($article , ['method' => 'POST' , 'action' => ['ArticlesController@update' , $article->id], 'enctype' => 'multipart/form-data']) !!}
    {!! Form::input('hidden','status',0) !!}
    @include('articles._form', ['articleShow' => action('ArticlesController@show', ['id' => $article->id])])
    {!! Form::close() !!}
    </div>
@stop
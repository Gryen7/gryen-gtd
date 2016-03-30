@extends('layouts.default')
@section('content')
    <h1>Article Show</h1>
    <hr>
    <h2>{{ $article->title }}</h2>
    <div class="article_content">
        {!! $article->content !!}
    </div>
@stop
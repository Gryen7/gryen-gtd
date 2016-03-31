@extends('layouts.default')
@section('content')
    <div class="col-md-8">
        <h2>{{ $article->title }}</h2>
        <hr>
        <div class="article_content">
            {!! $article->content !!}
        </div>
    </div>
    @include('pages._sidebar')
@stop
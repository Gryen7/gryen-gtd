@extends('layouts._default')
@section('content')
    <div class="col-md-8">
        <h2>{{ $article->title }}</h2>
        <hr>
        <div class="article_content">
            {!! $article->content !!}
        </div>
        @foreach($comments as $comment)
            <div>{{$comment->content}}</div>
        @endforeach
        @include('comments.create',['articleId' => $article->id])
    </div>
    @include('common._sidebar')
@stop
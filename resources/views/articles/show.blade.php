@extends('layouts._default', ['module' => 'article'])
@section('content')
    <div class="col-md-8 tar-article-box">
        <h2>{{ $article->title }}</h2>
        <hr>
        <div class="article-content">
            {!! $article->content !!}
        </div>
        Comments(10)
        <hr>
        <ul class="list-group">
            @foreach($comments as $comment)
                <li class="list-group-item">
                    {{$comment->content}}
                </li>
            @endforeach
        </ul>

        @include('comments.create',['articleId' => $article->id])
    </div>
    @include('common._sidebar')
@stop
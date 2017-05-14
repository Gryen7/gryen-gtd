@extends('layouts._default')
@section('content')
    <div class="col-md-10 col-md-offset-1 tar-article-box">
        <div class="text-center t-rtcl-ttl">{{ $article->title }}</div>
        <div class="article-content">
            {!! $article->content !!}
        </div>
    </div>
    @if (Auth::check())
    <div class="form-group tar-artl-ssbtn">
        <div class="btn-group-vertical">
            <a href="{{ action('ArticlesController@edit', ['id' => $article->id]) }}" class="btn btn-default">编辑这篇文章</a>
        </div>
    </div>
    @endif
@stop
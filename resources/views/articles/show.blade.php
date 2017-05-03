@extends('layouts._default', ['module' => 'article'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tar-article-box">
                <div class="text-center t-rtcl-ttl">{{ $article->title }}</div>
                <div class="article-content">
                    {!! $article->content !!}
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    @if (Auth::check())
    <div class="form-group tar-artl-ssbtn">
        <div class="btn-group-vertical">
            <a href="{{ action('ArticlesController@edit', ['id' => $article->id]) }}" class="btn btn-default">编辑这篇文章</a>
        </div>
    </div>
    @endif
@stop
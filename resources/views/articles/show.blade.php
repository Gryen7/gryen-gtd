@extends('layouts._default', ['module' => 'article'])
@section('content')
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="tar-article-box">
                <div class="text-center t-rtcl-ttl">{{ $article->title }}</div>
                <hr>
                <span class="pull-right tar-article-time">
                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $article->updated_at)->toDateString() }}
            </span>
                <div class="article-content">
                    {!! $article->content !!}
                </div>
                <div class="t-rtcl-tag">
                    @foreach($article->tagArray as $tag)
                        <span class="label label-default">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="btn-group pull-right t-rtcl-back" role="group" aria-label="...">
                <a href="{{ action('HomeController@index') }}" class="btn btn-default">回首页</a>
                <a href="{{ action('ArticlesController@index') }}" class="btn btn-default">返回列表</a>
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
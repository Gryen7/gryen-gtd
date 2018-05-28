@extends('layouts._default', [
    'module' => 'article-show',
    'vue' => true
])
@section('content')
    <article class="col-md-10 col-md-offset-1 tar-article-box">
        <header class="text-center t-rtcl-ttl" id="tArticleTitle">{{ $article->title }}</header>
        <section class="article-content">
            {!! $article->content !!}
        </section>
        <section class="t-rtcl-tags">
            @foreach($article->tagArray as $tag)
                <a class="t-label" href="{{ action('ArticlesController@index', ['tag' => $tag]) }}">{{ $tag }}</a>
            @endforeach
        </section>
        <footer class="clearfix">
            <span class="pull-right">本文更新于 <time pubdate >{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $article->updated_at)->toDateString() }}</time></span>
        </footer>
    </article>
    <more-articles></more-articles>
    @if (Auth::check())
    <div class="form-group tar-artl-ssbtn">
        <div class="btn-group-vertical">
            <a href="{{ action('ArticlesController@edit', ['id' => $article->id]) }}" class="btn btn-default">编辑这篇文章</a>
        </div>
    </div>
    @endif
    @include('articles._full-screen-img')
@stop

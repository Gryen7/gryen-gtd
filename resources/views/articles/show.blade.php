@extends('layouts._default', [
    'module' => 'article-show',
    'vue' => true
])
@section('content')
    <article class="t-rtcl-box">
        <h1 class="text-center t-rtcl-ttl" id="tArticleTitle">{{ $article->title }}</h1>
        <section class="t-rtcl-content">
            {!! $article->content !!}
        </section>
        <section class="t-rtcl-tags">
            @foreach($article->tagArray as $tag)
                <a class="badge badge-dark" href="{{ action('ArticlesController@tag', ['tag' => $tag]) }}">{{ $tag }}</a>
            @endforeach
        </section>
        <footer class="clearfix">
            <span>本文更新于 <time pubdate >{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $article->updated_at)->toDateString() }}</time></span>
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

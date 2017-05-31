@extends('layouts._default', ['module' => 'article-show'])
@section('content')
    <article class="col-md-10 col-md-offset-1 tar-article-box">
        <header class="text-center t-rtcl-ttl">{{ $article->title }}</header>
        <section class="article-content">
            {!! $article->content !!}
        </section>
        <footer>
            <span class="pull-right">本文更新于 <time pubdate >{{ $article->updated_at }}</time></span>
        </footer>
    </article>
    @if (Auth::check())
    <div class="form-group tar-artl-ssbtn">
        <div class="btn-group-vertical">
            <a href="{{ action('ArticlesController@edit', ['id' => $article->id]) }}" class="btn btn-default">编辑这篇文章</a>
        </div>
    </div>
    @endif
    @include('articles._full-screen-img')
@stop

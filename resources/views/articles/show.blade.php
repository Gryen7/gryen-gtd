@extends('layouts._default', ['module' => 'article-show'])
@section('content')
    <article class="col-md-10 col-md-offset-1 tar-article-box">
        <header class="text-center t-rtcl-ttl">{{ $article->title }}</header>
        <section class="article-content">
            {!! $article->content !!}
        </section>
        <footer class="clearfix">
            <span class="pull-right">本文更新于 <time pubdate >{{ $article->updated_at }}</time></span>
        </footer>
        @if(env('APP_ENV') === 'production')
        <div id="cloud-tie-wrapper" class="cloud-tie-wrapper"></div>
        @endif
    </article>
    @if (Auth::check())
    <div class="form-group tar-artl-ssbtn">
        <div class="btn-group-vertical">
            <a href="{{ action('ArticlesController@edit', ['id' => $article->id]) }}" class="btn btn-default">编辑这篇文章</a>
        </div>
    </div>
    @endif
    @include('articles._full-screen-img')
    @if(env('APP_ENV') === 'production')
    <!--suppress JSUnresolvedLibraryURL -->
    <script src="https://img1.cache.netease.com/f2e/tie/yun/sdk/loader.js"></script>
    <!--suppress ES6ConvertVarToLetConst, JSUnusedLocalSymbols -->
    <script>
        var cloudTieConfig = {
            url: document.location.href,
            sourceId: "",
            productKey: "2fe43f2f72c64a53a5b027669a46038d",
            target: "cloud-tie-wrapper"
        };
        var yunManualLoad = true;
        Tie.loader("aHR0cHM6Ly9hcGkuZ2VudGllLjE2My5jb20vcGMvbGl2ZXNjcmlwdC5odG1s", true);
    </script>
    @endif
@stop

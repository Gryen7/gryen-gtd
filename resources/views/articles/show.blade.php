@extends('layouts._default', [
'module' => 'article-show',
'vue' => true
])
@section('content')
<article class="">
    <h1 class="" id="tArticleTitle">{{ $article->title }}</h1>
    <hr>
    <section class="">
        {!! $article->content !!}
    </section>
    <section class="">
        @foreach($article->tagArray as $tag)
        <a class="" href="{{ action('ArticlesController@tag', ['tag' => $tag]) }}">{{ $tag }}</a>
        @endforeach
    </section>
    <footer class="">
        <p class="">
            <svg class="" aria-hidden="true">
                <use xlink:href="#icon-shijian"></use>
            </svg>
            <span>最后更新：</span><span><time pubdate>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $article->updated_at)->toDateString() }}</time></span>
        </p>
        <p class="">
            <svg class="" aria-hidden="true">
                <use xlink:href="#icon-copyright"></use>
            </svg>
            <span>版权声明：</span><span>自由转载-非商用-非衍生-保持署名（<a target="_blank" href="https://creativecommons.org/licenses/by-nc-nd/3.0/deed.zh">创意共享3.0许可证</a>）</span>
        </p>
        <p class=""><a href="mailto:{{ env('APP_EMAIL') }}" class="">
                <svg class="" aria-hidden="true">
                    <use xlink:href="#icon-email"></use>
                </svg>
                <span>与我联系：</span><span><u>{{ env('APP_EMAIL') }}</u></span>
            </a></p>
    </footer>
</article>
<div id="PublicationVue">
    <more-articles></more-articles>
</div>
@if (Auth::check())
<div class="">
    <div class="">
        <a href="{{ action('ArticlesController@edit', ['id' => $article->id]) }}" class="">编辑</a>
        <button class="" disabled>{{ $article->views }}</button>
    </div>
</div>
@endif
@include('articles._full-screen-img')
@stop

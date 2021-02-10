@extends('layouts._default', [
'module' => 'article-show',
'vue' => true
])
@section('content')
<article class="max-w-4xl mx-auto">
    <h1 class="mb-4">
        {{ $article->title }}
        @if (Auth::check())
        <a href="{{ action('ArticlesController@edit', ['id' => $article->id]) }}"
            class="text-sm underline text-gray-500">编辑</a>
        @endif
    </h1>
    <section class="">
        {!! $article->content !!}
    </section>
    <section class="mt-4">
        @foreach($article->tagArray as $tag)
        <a class="bg-gray-800 text-gray-100 rounded-sm p-1"
            href="{{ action('ArticlesController@tag', ['tag' => $tag]) }}">{{ $tag }}</a>
        @endforeach
    </section>
    <footer class="mt-4 text-gray-500 border-t-2 pt-2 text-sm">
        <p class="flex items-center leading-6">
            <span class="flex items-center">
                <svg class="w-4 h-4 mr-1" aria-hidden="true">
                    <use xlink:href="#icon-shijian"></use>
                </svg>
                <span class="w-20">最后更新：</span>
            </span>
            <span>
                <time pubdate>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',
                    $article->updated_at)->toDateString() }}</time>
            </span>
        </p>
        <p class="flex items-center leading-6">
            <span class="flex items-center">
                <svg class="w-4 h-4 mr-1" aria-hidden="true">
                    <use xlink:href="#icon-copyright"></use>
                </svg>
                <span class="w-20">版权声明：</span>
            </span>
            <span class="truncate">自由转载-非商用-非衍生-保持署名(<a target="_blank"
                    href="https://creativecommons.org/licenses/by-nc-nd/3.0/deed.zh">创意共享3.0许可证</a>)
            </span>
        </p>
        <p class="flex items-center leading-6">
            <span class="flex items-center">
                <svg class="w-4 h-4 mr-1" aria-hidden="true">
                    <use xlink:href="#icon-email"></use>
                </svg>
                <span class="w-20">与我联系：</span>
            </span>
            <span>
                <a href="mailto:{{ env('APP_EMAIL') }}">
                    <u>{{ env('APP_EMAIL')}}</u>
                </a>
            </span>
        </p>
    </footer>
</article>
<div id="PublicationVue" class="max-w-4xl mx-auto">
    <more-articles></more-articles>
</div>
@include('articles._full-screen-img')
@stop

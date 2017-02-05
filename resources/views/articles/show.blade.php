@extends('layouts._default', ['module' => 'article'])
@section('content')
    <div class="col-xs-1"></div>
    <div class="col-xs-10 tar-article-box">
        <div class="t-rtcl-ttl">{{ $article->title }}</div>
        <hr>
        <span class="pull-right tar-article-time">
                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $article->updated_at)->toDateString() }}
        </span>
        <div class="article-content">
            {!! $article->content !!}
        </div>
        {{--Comments(10)--}}
        {{--<hr>--}}
        {{--<ul class="list-group">--}}
            {{--@foreach($comments as $comment)--}}
                {{--<li class="list-group-item">--}}
                    {{--{{$comment->content}}--}}
                {{--</li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}

        {{--@include('comments.create',['articleId' => $article->id])--}}
    </div>
    <div class="col-xs-1"></div>
@stop
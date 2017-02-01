@extends('layouts._default', ['module' => 'article'])
@section('content')
    <div class="col-md-8 tar-article-box">
        <h4>{{ $article->title }}</h4>
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
    @include('common._sidebar')
@stop
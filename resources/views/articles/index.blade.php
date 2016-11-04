@extends('layouts._default')
@section('content')
    <div class="col-md-8">
        <ul>
            @foreach($articles as $article)
                <li>
                    <h2><a href="{{ action('ArticlesController@show',[$article->id]) }}">{{ $article->title }}</a></h2>
                    <div class="article_content">{{ $article->description }}</div>
                </li>
            @endforeach
        </ul>
    </div>
    @include('common._sidebar')
@stop
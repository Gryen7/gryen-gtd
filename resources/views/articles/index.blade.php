@extends('layouts.default')
@section('content')
    <h1>Articles</h1>
    <hr>
    <ul>
        @foreach($articles as $article)
            <li>
                <h2><a href="{{ action('ArticlesController@show',[$article->id]) }}">{{ $article->title }}</a></h2>

                <div class="article_content">{{ $article->description }}</div>
            </li>
        @endforeach
    </ul>
@stop
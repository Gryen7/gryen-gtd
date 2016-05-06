@extends('layouts._base')
@section('base_content')
    @parent
    @include('pages._nav')
    <div class="jumbotron tar-jumbotron">
        <div class="container">
            <h1>Hello, world!</h1>
            <p>...</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul>
                    @foreach($articles as $article)
                        <li>
                            <h2>
                                <a href="{{ action('ArticlesController@show',[$article->id]) }}">{{ $article->title }}</a>
                            </h2>
                            <div class="article_content">{{ $article->description }}</div>
                        </li>
                    @endforeach
                </ul>
            </div>
            @include('pages._sidebar')
        </div>
    </div>
@endsection
@extends('layouts._control', ['module' => 'control'])
@section('subNavigation')
    <div class="collapse navbar-collapse">
        <form class="navbar-form navbar-left">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Search</button>
        </form>
        <div class="navbar-right">
            <a href="{{ action('ArticlesController@create') }}" class="btn btn-success navbar-btn">新文章</a>
            <button class="btn btn-default navbar-btn">
                <span class="glyphicon glyphicon-object-align-bottom"></span>
            </button>
        </div>
    </div>
@stop
@section('content')

    <ul class="list-group tar-cpa-list">
        <li class="list-group-item">
            <span class="col-xs-8">Title</span>
            <span class="col-xs-4">Options</span>
        </li>
        @foreach($articles as $article)
            <li class="list-group-item">
                <span class="col-xs-8">{{ $article->title }}</span>
                <ul class="list-inline btn-group col-xs-4 tar-ul-nomargin">
                    <li class="btn btn-default"><a href="{{ action('ArticlesController@show',[$article->id]) }}"
                                                   target="_blank">View</a></li>
                    <li class="btn btn-default"><a href="{{ action('ArticlesController@edit',[$article->id]) }}"
                                                   target="_blank">Edit</a></li>
                    <li class="btn btn-default"><a href="{{ action('ArticlesController@delete',[$article->id]) }}"
                                                   data-a-type="ajax">Delete</a></li>
                </ul>
            </li>
        @endforeach
    </ul>
@stop
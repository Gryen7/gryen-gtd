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
            <a href="{{ action('ArticlesController@create') }}" class="btn btn-success navbar-btn">New Article</a>
            <button class="btn btn-default navbar-btn">
                <span class="glyphicon glyphicon-object-align-bottom"></span>
            </button>
        </div>
    </div>
@stop
@section('content')

    <ul class="list-group tar-cpa-list">
        <li class="list-group-item">
            <span class="col-xs-1">ID</span>
            <span class="col-xs-6">Title</span>
            <span class="col-xs-5">Options</span>
        </li>
        @foreach($articles as $article)
            <li class="list-group-item">
                <span class="col-xs-1">{{ $article->id }}</span>
                <span class="col-xs-6">{{ $article->title }}</span>
                <ul class="list-inline btn-group col-xs-5 tar-ul-nomargin">
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
    <nav>
        <ul class="pagination">
            @if ($prev !== 0)
                <li>
                    <a href="{{ action('ControlPanelController@articles', $prev) }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;prev</span>
                    </a>
                </li>
            @endif
            @if ($next !== $pageCount)
                <li>
                    <a href="{{ action('ControlPanelController@articles', $next) }}" aria-label="Next">
                        <span aria-hidden="true">next&raquo;</span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@stop
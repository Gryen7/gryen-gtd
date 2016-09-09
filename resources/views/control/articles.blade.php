@extends('layouts._control')
@section('subNavigation')
    <div class="collapse navbar-collapse">
        <form class="navbar-form navbar-left">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Search</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="{{ action('ArticlesController@create') }}">New Article</a>
            </li>
            <li>
                <a href=""><span class="glyphicon glyphicon-object-align-bottom"></span></a>
            </li>
        </ul>
    </div>
@stop
@section('content')
    <div class="table-responsive tar-overflow-initial">
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Options</th>
            </tr>
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                @if($article->status == 1)published
                                @elseif($article->status == 0)editing
                                @endif<span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a data-id="{{ $article->id }}">published</a></li>
                                <li><a data-id="{{ $article->id }}">editing</a></li>
                            </ul>
                        </div>
                    </td>
                    <td>
                        <ul class="list-group">
                            <li class="list-group-item pull-left"><a
                                        href="{{ action('ArticlesController@show',[$article->id]) }}"
                                        target="_blank">view</a></li>
                            <li class="list-group-item pull-left"><a
                                        href="{{ action('ArticlesController@edit',[$article->id]) }}"
                                        target="_blank">edit</a></li>
                            <li class="list-group-item pull-left"><a
                                        href="{{ action('ArticlesController@delete',[$article->id]) }}" data-a-type="ajax">delete</a></li>
                            <li class="list-group-item pull-left"><a href="" data-toggle="modal"
                                                                     data-target="#myModal">add todo</a></li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <nav>
        <ul class="pagination">
            <li>
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
                <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
@stop
@include('common._modal', [
    'modalId' => 'ctrl-new-article',
    'modalTitle' => 'New Article',
    'exClass' => 'modal-lg bg-white scroll-x'
])
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
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
                <tr class="tar-tbltd-vcenter">
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>
                        <ul class="list-inline btn-group tar-ul-nomargin">
                            <li class="btn btn-default"><a href="{{ action('ArticlesController@show',[$article->id]) }}"
                                        target="_blank">view</a></li>
                            <li class="btn btn-default"><a href="{{ action('ArticlesController@edit',[$article->id]) }}"
                                        target="_blank">edit</a></li>
                            <li class="btn btn-default"><a href="{{ action('ArticlesController@delete',[$article->id]) }}"
                                        data-a-type="ajax">soft delete</a></li>
                            <li class="btn btn-default"><a href="" data-toggle="modal"
                                   data-target="#ctrl-new-article">add todo</a></li>
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>
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
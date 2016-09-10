@extends('layouts._control')
@section('subNavigation')
    <div class="collapse navbar-collapse">
        <form class="navbar-form navbar-left">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Search</button>
        </form>
    </div>
@stop
@section('content')
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Options</th>
            </tr>
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>
                        <ul class="list-group">
                            <li class="list-group-item pull-left"><a
                                        href="{{ action('ArticlesController@show',[$article->id]) }}"
                                        target="_blank">view</a></li>
                            <li class="list-group-item pull-left"><a
                                        href="{{ action('ArticlesController@edit',[$article->id]) }}"
                                        target="_blank">resume</a></li>
                            <li class="list-group-item pull-left"><a
                                        href="{{ action('ArticlesController@destroy',[$article->id]) }}">force delete</a></li>
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
    {{--模态框开始--}}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Description</h4>
                </div>
                {!! Form::open() !!}
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::input('text','description','',['class' => 'form-control','placeholder'=>'Please input description for the todo...']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
                {!! Form::close() !!}
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop
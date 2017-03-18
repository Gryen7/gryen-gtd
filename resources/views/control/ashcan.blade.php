@extends('layouts._control', ['module' => 'control'])
@section('subNavigation')
@stop
@section('content')
    <div class="table-responsive">
        <table class="table table-striped tar-ctl-table">
            <thead>
            <tr>
                <th>标题</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->title }}</td>
                    <td>
                        <ul class="btn-group">
                            <li class="btn btn-default"><a
                                        href="{{ action('ArticlesController@edit',[$article->id]) }}"
                                        target="_blank">恢复</a></li>
                            <li class="btn btn-default"><a
                                        href="{{ action('ArticlesController@destroy',[$article->id]) }}">彻底删除</a></li>
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $articles->links() }}
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">确定</button>
                </div>
                {!! Form::close() !!}
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop
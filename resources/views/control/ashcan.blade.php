@extends('layouts._control', ['module' => 'control'])
@section('subNavigation')
@stop
@section('content')
    <ul class="list-group tar-cpa-list">
        <li class="list-group-item">
            <div class="col-xs-8">标题</div>
            <div class="col-xs-3 text-center">操作</div>
        </li>
        @foreach($articles as $article)
            <li class="list-group-item">
                <div class="col-xs-8">{{ $article->title }}</div>
                <div class="col-xs-4 text-center">
                    <ul class="btn-group no-padding-left">
                        <li class="btn btn-success"><a
                                    href="{{ action('ArticlesController@edit',[$article->id]) }}"
                                    target="_blank">重新编辑发布</a></li>
                        <li class="btn btn-danger"><a
                                    href="{{ action('ArticlesController@destroy',[$article->id]) }}">彻底删除</a></li>
                    </ul>
                </div>
            </li>
        @endforeach
    </ul>
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
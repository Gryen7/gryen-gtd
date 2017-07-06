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
@stop
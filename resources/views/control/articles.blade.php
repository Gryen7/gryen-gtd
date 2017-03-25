@extends('layouts._control', ['module' => 'control'])
@section('subNavigation')
    <a href="{{ action('ArticlesController@create') }}" class="btn btn-success navbar-btn">新文章</a>
@stop
@section('content')
    <ul class="list-group tar-cpa-list">
        <li class="list-group-item">
            <div class="col-xs-8">标题</div>
            <div class="col-xs-3 text-center">操作</div>
            <div class="col-xs-1 text-center">状态</div>
        </li>
        @foreach($articles as $article)
            <li class="list-group-item">
                <div class="col-xs-8">{{ $article->title }}</div>
                <div class="col-xs-3 text-center">
                    <ul class="btn-group no-padding-left">
                        <li class="btn btn-success"><a href="{{ action('ArticlesController@show',[$article->id]) }}"
                                                       target="_blank">查看</a></li>
                        <li class="btn btn-primary"><a href="{{ action('ArticlesController@edit',[$article->id]) }}"
                                                       target="_blank">编辑</a></li>
                        <li class="btn btn-danger"><a href="{{ action('ArticlesController@delete',[$article->id]) }}"
                                                      data-a-type="ajax">删除</a></li>
                    </ul>
                </div>

                <ul class="col-xs-1 text-center">
                    @if($article->status === 1)
                        <span class="label label-success">已发布</span>
                    @elseif($article->status === 0)
                        <span class="label label-default">待编辑</span>
                    @endif
                </ul>
            </li>
        @endforeach
    </ul>

    {{ $articles->links() }}
@stop
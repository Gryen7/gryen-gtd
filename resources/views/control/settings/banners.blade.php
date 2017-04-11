@extends('control.settings')
@section('content')
    <div class="col-xs-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">首页推荐</h3>
            </div>
            <div class="panel-body">
                <ul class="list-group row tar-cps-banner">
                    @foreach($banners as $banner)
                    <li class="list-group-item t-ctl-bnrlist" data-id="{{$banner->id}}">
                        <div class="col-xs-6 tar-cps-bimg" style='background: url("{{ imageView2($banner->cover, [
                            'w' => 225,
                            'h' => 94
                        ]) }}")'>
                            <span class="glyphicon glyphicon-cloud-upload"></span>
                        </div>
                        <div class="col-xs-6">
                            <h5>{{ $banner->article_title }}</h5>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default set-top">置顶</button>
                                <button type="button" class="btn btn-default set-weight">权重</button>
                                <button type="button" class="btn btn-danger delete">移除</button>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">文章列表</h3>
            </div>
            <div class="panel-body tar-cps-artl">
                <div class="input-group">
                    <span class="input-group-addon">筛选：</span>
                    <input type="text" class="form-control" placeholder="关键词">
                </div>
                <ul class="list-group">
                    @foreach($articles as $article)
                        <li class="list-group-item">
                            <a href="{{ action('ArticlesController@show',[$article->id]) }}" target="_blank">{{
                        $article->title
                         }}</a>
                            <button type="button" class="btn btn-success pull-right tar-btn-stbnr" data-id="{{ $article->id }}" data-title="{{ $article->title }}">设置</button>
                        </li>
                    @endforeach
                </ul>
                {{ $articles->links() }}
            </div>
        </div>
    </div>
@endsection

@include('control.settings._modal-set-banner', [
      'modalId' => 'set-banner',
      'modalTitle' => 'Set Banner',
])
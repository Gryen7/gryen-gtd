@extends('control.settings')
@section('content')
    <div class="col-xs-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Banners</h3>
            </div>
            <div class="panel-body">
                <ul class="list-group row tar-cps-banner">
                    <li class="list-group-item">
                        <img class="col-xs-6"
                             src="http://7xnswo.com1.z0.glb.clouddn.com/uploads/2016-11-12/0ed742a6f8a3d58f87cfa5ca74a56afc.jpg?imageView2/1/w/960/h/400"
                             alt="">
                        <div class="col-xs-6">
                            <h5>标题</h5>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default">Top</button>
                                <button type="button" class="btn btn-default">Weight</button>
                                <button type="button" class="btn btn-danger">Remove</button>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <img class="col-xs-6"
                             src="http://7xnswo.com1.z0.glb.clouddn.com/uploads/2016-11-12/72e32911c86d61ee388e6349941b48f9.jpg?imageView2/1/w/960/h/400"
                             alt="">
                        <div class="col-xs-6">
                            <h5>标题</h5>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default">Top</button>
                                <button type="button" class="btn btn-default">Weight</button>
                                <button type="button" class="btn btn-danger">Remove</button>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <img class="col-xs-6"
                             src="http://7xnswo.com1.z0.glb.clouddn.com/uploads/2016-11-12/5d0bf6afb7a25e047615b2a0a09715f1.jpg?imageView2/1/w/960/h/400"
                             alt="">
                        <div class="col-xs-6">
                            <h5>标题</h5>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default">Top</button>
                                <button type="button" class="btn btn-default">Weight</button>
                                <button type="button" class="btn btn-danger">Remove</button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Articles</h3>
            </div>
            <div class="panel-body tar-cps-artl">
                <div class="input-group">
                    <span class="input-group-addon">Filter：</span>
                    <input type="text" class="form-control" placeholder="Keywords">
                </div>
                <ul class="list-group">
                    @foreach($articles as $article)
                        <li class="list-group-item">
                            <a href="{{ action('ArticlesController@show',[$article->id]) }}" target="_blank">{{
                        $article->title
                         }}</a>
                            <button type="button" class="btn btn-success pull-right">Set Banner</button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@stop
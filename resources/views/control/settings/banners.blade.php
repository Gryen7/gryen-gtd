@extends('control.settings')
@section('content')
    <div class="col-xs-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Banners</h3>
            </div>
            <div class="panel-body">
                <ul class="list-group row tar-cps-banner">
                    @foreach($banners as $banner)
                    <li class="list-group-item">
                        <div class="col-xs-6 tar-cps-bimg" style='background: url("{{ $banner->cover }}")'>
                            <span class="glyphicon glyphicon-cloud-upload"></span>
                        </div>
                        <div class="col-xs-6">
                            <h5>{{ $banner->article_title }}</h5>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default">Top</button>
                                <button type="button" class="btn btn-default">Weight</button>
                                <button type="button" class="btn btn-danger">Remove</button>
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
                <h3 class="panel-title">Articles</h3>
            </div>
            <div class="panel-body tar-cps-artl">
                <div class="input-group">
                    <span class="input-group-addon">Filter：</span>
                    <input type="text" class="form-control" placeholder="Keywords">
                </div>
                <ul class="list-group">
                    @foreach($articles['articles'] as $article)
                        <li class="list-group-item">
                            <a href="{{ action('ArticlesController@show',[$article->id]) }}" target="_blank">{{
                        $article->title
                         }}</a>
                            <button type="button" class="btn btn-success pull-right tar-btn-stbnr" data-id="{{ $article->id }}" data-title="{{ $article->title }}">Set Banner</button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

@include('control.settings._modal-set-banner', [
      'modalId' => 'set-banner',
      'modalTitle' => 'Set Banner',
])
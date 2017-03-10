@extends('control.settings')
@section('content')
    <div class="col-xs-6">
        <div class="panel panel-default">
            <div class="panel-heading">聆听故事</div>
            <div class="panel-body">
                {{ Form::open(['action' => 'Control\HomeController@story']) }}
                <div class="form-group">
                    <label for="title">标题：</label>
                    {{ Form::input('text', 'title', '', ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    <label for="title">图片：</label>
                    {{ Form::input('text', 'images', '', ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    <label for="title">资源：</label>
                    {{ Form::input('text', 'resource', '', ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    <label for="title">描述：</label>
                    {{ Form::textarea('content', '', ['class' => 'form-control no-resize']) }}
                </div>
                <div class="form-group">
                    {{ Form::submit('更新', ['class' => 'form-control btn btn-default']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="panel panel-default">
            <div class="panel-heading">致知</div>
            <div class="panel-body">
                {{ Form::open(['action' => 'Control\HomeController@word']) }}
                <div class="form-group">
                    {{ Form::textarea('content', '', ['class' => 'form-control no-resize']) }}
                </div>
                <div class="form-group">
                    {{ Form::submit('更新', ['class' => 'form-control btn btn-default']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
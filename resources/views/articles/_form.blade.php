<div class="col-md-8">
    <div class="form-group tar-artl-ssbtn">
        <div class="btn-group-vertical">
            @if(isset($articleShow))
                <a href="{{ $articleShow }}" class="btn btn-default">查看</a>
            @endif
            {!! Form::button('提交',['class' => 'btn btn-success','id' => 'submit-article']) !!}
            {!! Form::button('暂存',['class' => 'btn btn-primary','id' => 'save-article']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::textarea('content',null,['class' => 'form-control','id'=>'content-textarea']) !!}
    </div>
    <div class="tar-artl-ttlbox">
        {!! Form::text('title',null,['class' => 'form-control tar-artl-title','placeholder' =>'文章标题', 'autocomplete' => 'off']) !!}
    </div>
</div>
<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading">设置封面：</div>
        @if(isset($article->cover))
            <div class="panel-body t-edit-cover"
                 style='background: url({{$article->cover . '?imageView2/1/w/328/h/246'}}) no-repeat;background-size: cover;'>
                {!! Form::input('file', 'cover', '', ['multiple' => 'multiple', 'accept' => 'image/*', 'id' => 'tCover']) !!}
            </div>
        @else
            <div class="panel-body t-edit-cover"
                 style='background: url("http://static.targaryen.top/uploads/2017-02-14/cfcc52f95c85a30d445474f21ac8bff5.jpg?imageView2/1/w/328/h/246") no-repeat;background-size: cover;'>
                {!! Form::input('file', 'cover', '', ['multiple' => 'multiple', 'accept' => 'image/*', 'id' => 'tCover']) !!}
            </div>
        @endif
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">设置标签：</div>
        <div class="panel-body">
            <div class="form-control t-lable">
                <span class="label label-default">旅行</span>
                <input type="text">
            </div>
            <div class="t-lbl-box">
                <span class="label label-default">旅行</span>
                <span class="label label-default">生活</span>
                <span class="label label-default">旅行</span>
                <span class="label label-default">生活</span>
                <span class="label label-default">娱乐</span>
                <span class="label label-default">旅行</span>
                <span class="label label-default">生活</span>
                <span class="label label-default">旅行</span>
                <span class="label label-default">生活</span>
            </div>
        </div>
    </div>
</div>
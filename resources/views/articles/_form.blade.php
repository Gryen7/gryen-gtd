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
        {!! Form::text('title',null,['class' => 'form-control tar-artl-title','placeholder' =>'Please input title ...', 'autocomplete' => 'off']) !!}
    </div>
</div>
<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading">设置封面：</div>
        <div class="panel-body t-edit-cover" style='background: url("http://7xnswo.com1.z0.glb.clouddn.com/wallhaven-85912.jpg?imageView2/1/w/328/h/246") no-repeat;background-size: cover;'>
            {!! Form::input('file', 'upload_file', '', ['multiple' => 'multiple', 'accept' => 'image/*', 'id' => 'tCover']) !!}
        </div>
    </div>
</div>
<div class="col-md-10 col-md-offset-1">
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
<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">设置封面及标签：</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6 t-edit-cover">
                    <img id="tEditCover" src="{{ imageView2($article->cover, [
                'w' => 328,
                'h' => 246
             ]) }}" alt="">
                    {!! Form::input('file', 'cover', '', ['multiple' => 'multiple', 'accept' => 'image/*', 'id' => 'tCover']) !!}
                </div>
                @if(!isset($articleShow))
                    <div class="col-md-6">
                        <div class="form-control t-lable">
                            <div class="t-tag-box" id="tTagBox">
                            </div>
                            {{ Form::input('text', 'tTagInput', '', ['id' => 'tTagInput']) }}
                            {{ Form::input('hidden', 'tags', '', ['id' => 'tTags']) }}
                        </div>
                        <div class="t-lbl-box" id="tLblBox">
                            @foreach($tags as $tag)
                                <span class="t-tag label label-default">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
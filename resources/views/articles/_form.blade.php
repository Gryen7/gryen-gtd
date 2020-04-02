<div>
    <div class="form-group tar-artl-ssbtn">
        <div class="btn-group-vertical">
            @if(isset($articleShow))
                <a href="{{ $articleShow }}" class="btn btn-default">查看</a>
            @endif
            {!! Form::button('提交',['class' => 'btn btn-success','id' => 'submit-article']) !!}
            {!! Form::button('暂存',['class' => 'btn btn-primary','id' => 'save-article']) !!}
            <a href="javascript:history.go(-1);" class="btn btn-default">放弃</a>
        </div>
    </div>
    <div class="form-group">
        {!! Form::text('title',null,['class' => 'form-control tar-artl-title','placeholder' =>'文章标题', 'autocomplete' => 'off']) !!}
    </div>
    <div class="form-group">
        <div id="content-textarea"></div>
    </div>
</div>
<div>
    <div class="panel panel-default">
        <div class="panel-heading">封面、描述、标签：</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-5 t-edit-cover">
                    <img id="tEditCover" src="{{ imageView2($article->cover, [
                'w' => 328,
                'h' => 246
             ]) }}" alt="">
                    {!! Form::input('file', '', '', ['multiple' => 'multiple', 'accept' => 'image/*', 'id' => 'tCoverFile']) !!}
                    {!! Form::input('hidden', 'cover', null, ['name' => 'cover', 'id' => 'tCover']) !!}
                    <div class="progress">
                        <div id="tCovrProgrs" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0">
                            <span class="sr-only">完成0%</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        {!! Form::textarea('description', isset($article->description) ? $article->description : '', ['class' => 'form-control t-no-resize t-rtcl-desc', 'maxlength' => '140', 'rows' => '4', 'placeholder' => '文章描述']) !!}
                    </div>
                    <div class="form-control t-form-labels">
                        <div class="t-tag-box" id="tTagBox">
                            @if(isset($article->tagArray) && count($article->tagArray))
                                @foreach($article->tagArray as $tagInArticle)
                                    <span class="t-tag t-label">{{ $tagInArticle }}</span>
                                @endforeach
                            @endif
                        </div>
                        {{ Form::input('text', 'tTagInput', '', ['id' => 'tTagInput', 'class' => 't-tag-input']) }}
                        {{ Form::input('hidden', 'tags', isset($article->tags) ? $article->tags : '', ['id' => 'tTags']) }}
                    </div>
                    <div class="t-lbl-box" id="tLblBox">
                        @foreach($tags as $tag)
                            <span class="t-tag t-label">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

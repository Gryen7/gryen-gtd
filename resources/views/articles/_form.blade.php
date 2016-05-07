<div class="col-md-8">
    <div class="form-group">
        {!! Form::text('title',null,['class' => 'form-control','placeholder' =>'Please input title ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::textarea('content',null,['class' => 'form-control','id'=>'content']) !!}
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        {!! Form::button($submitButtonText,['class' => 'btn btn-primary form-control','onclick' => 'saveOrSubmitArticle(1)']) !!}
        {!! Form::button($submitButtonText2,['class' => 'btn btn-primary form-control','onclick' => 'saveOrSubmitArticle(0)']) !!}
    </div>
    <div class="form-group">
        {!! Form::textarea('description',null,['class' => 'form-control','rows' =>'1','placeholder'=>'Please input description ...']) !!}
    </div>
</div>
{!! Html::script(asset('/vendor/js/simditor.js')) !!}
{!! Html::script(asset('/vendor/js/simditor-markdown.js')) !!}
{!! Html::script(asset('/js/article-form.js')) !!}
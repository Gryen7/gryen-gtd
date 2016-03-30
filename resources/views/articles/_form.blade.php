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
        {!! Form::submit($submitButtonText,['class' => 'btn btn-primary form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::textarea('description',null,['class' => 'form-control','rows' =>'1','placeholder'=>'Please input description ...']) !!}
    </div>
    @include('errors.list')
</div>
<script type="text/javascript" src="/vendor/js/simditor.js"></script>
<script type="text/javascript" src="/vendor/js/simditor-markdown.js"></script>
<script type="text/javascript" src="/js/article.js"></script>
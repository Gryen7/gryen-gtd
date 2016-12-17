<div class="col-md-12">
    <div class="form-group tar-artl-ssbtn">
        <div class="btn-group pull-right">
            {!! Form::button($submitButtonText,['class' => 'btn btn-success','id' => 'submit-article']) !!}
            {!! Form::button($submitButtonText2,['class' => 'btn btn-primary','id' => 'save-article']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::textarea('content',null,['class' => 'form-control','id'=>'content-textarea']) !!}
    </div>
    <div class="tar-artl-ttlbox">
        {!! Form::text('title',null,['class' => 'form-control tar-artl-title','placeholder' =>'Please input title ...']) !!}
    </div>
</div>
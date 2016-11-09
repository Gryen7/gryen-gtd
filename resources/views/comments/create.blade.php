{!! Form::open(['action' => 'CommentsController@store']) !!}
<div class="form-group">
    <div class="input-group">
    <div class="input-group-addon">Email:</div>
    {!! Form::email('Your Email',null,['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::textarea('content',null,['class' => 'form-control no-resize','id'=>'content']) !!}
</div>
{!! Form::hidden('article_id',$articleId) !!}
<div class="form-group">
    {!! Form::submit('提交评论',['class' => 'btn btn-primary form-control']) !!}
</div>
{!! Form::close() !!}
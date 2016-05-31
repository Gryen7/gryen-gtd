{!! Form::open(['action' => 'CommentsController@store']) !!}
<div class="form-group">
    {!! Form::text('Your Name',null,['class' => 'form-control','placeholder' =>'Please input your name ...']) !!}
</div>
<div class="form-group">
    {!! Form::textarea('content',null,['class' => 'form-control','id'=>'content']) !!}
</div>
{!! Form::hidden('article_id',$articleId) !!}
<div class="form-group">
    {!! Form::submit('提交评论',['class' => 'btn btn-primary form-control']) !!}
    {!! Form::button('清空',['class' => 'btn btn-primary form-control']) !!}
</div>
{!! Form::close() !!}
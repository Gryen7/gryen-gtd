<div id="tar-add-todo" class="tar-add-todo col-xs-12 clearfix">
    {!! Form::open(['action' => 'Control\ToDosController@store', 'class' => 'navbar-form row']) !!}
    <div class="form-group col-xs-1">
        {!! Form::select('importance', [1=> '低', 2=> '中', 3=> '高'], 1, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-xs-5">
        {!! Form::text('content', null, [
            'class' => 'form-control tar-todo-content',
            'placeholder' => '待办事项'
        ]) !!}
    </div>
    <div class="form-group col-xs-2">
        {!! Form::text('begin_at', null, [
            'id' => 'crt-td-strt-dtpckr',
            'class' => 'btn btn-default',
            'readonly',
            'placeholder' => '开始时间'
        ]) !!}
    </div>
    <div class="form-group col-xs-2">
        {!! Form::text('end_at', null, [
            'id' => 'crt-td-end-dtpckr',
            'class' => 'btn btn-default',
            'readonly',
            'placeholder' => '结束时间'
        ]) !!}
    </div>
    <div class="form-group col-xs-1">
       {!! Form::button('详细', ['class' => 'btn btn-default', 'id' => 'tShowDescription', 'cols' => '', 'rows' => '']) !!}
    </div>
    <div class="form-group col-xs-1">
        {!! Form::submit('创建', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    <div class="form-group col-xs-12">
        {!! Form::textarea('description', null, ['class' => 't-ctl-tddesc form-control', 'id' => 'tCtlDescription']) !!}
    </div>
    {!! Form::close() !!}
</div>
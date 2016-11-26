<div id="tar-add-todo" class="tar-add-todo col-xs-12 clearfix">
    {!! Form::open(['action' => 'ToDosController@store', 'class' => 'navbar-form row']) !!}
    <div class="form-group col-xs-1">
        {!! Form::select('importance', [1=> 'IMP', 2=> 'VIO', 3=> 'IMMD'], 1, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-xs-2">
        {!! Form::text('content', null, ['class' => 'form-control tar-todo-content', 'placeholder' => 'todo\'s content']) !!}
    </div>
    <div class="form-group col-xs-2">
        {!! Form::text('begin_at', null, [
            'id' => 'crt-td-strt-dtpckr',
            'class' => 'form-control',
            'readonly',
            'placeholder' => 'Begin at'
        ]) !!}
    </div>
    <div class="form-group col-xs-2">
        {!! Form::text('end_at', null, [
            'id' => 'crt-td-end-dtpckr',
            'class' => 'form-control',
            'readonly',
            'placeholder' => 'End at'
        ]) !!}
    </div>
    <div class="form-group col-xs-4">
       {!! Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'description']) !!}
    </div>
    <div class="form-group col-xs-1">
        {!! Form::submit('create', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
</div>
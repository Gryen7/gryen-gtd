<div id="tar-add-todo" class="tar-add-todo col-xs-12 clearfix">
    {!! Form::open(['action' => 'ToDosController@store', 'class' => 'navbar-form row']) !!}
    <div class="form-group col-xs-3">
        {!! Form::text('content', null, ['class' => 'form-control tar-todo-content', 'placeholder' => 'Please input Todo\'s content']) !!}
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
    <div class="form-group col-xs-3">
        {!! Form::button('description', [
            'class' => 'form-control tar-todo-desc',
            'placeholder' => 'Description about the Todo'
        ]) !!}
    </div>
    <div class="form-group col-xs-2">
        {!! Form::submit('create', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
</div>
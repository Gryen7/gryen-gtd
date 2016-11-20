<div id="tar-add-todo" class="tar-add-todo col-xs-12 clearfix">
    {!! Form::open(['action' => 'ToDosController@store', 'class' => 'navbar-form row']) !!}
    <div class="form-group col-xs-3">
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Please Input Todo\'s Title']) !!}
    </div>
    <div class="form-group col-xs-2">
        {!! Form::text('begin_at', null, [
            'id' => 'crt-td-strt-dtpckr',
            'class' => 'form-control',
            'readonly',
            'placeholder' => 'Choose a Date'
        ]) !!}
    </div>
    <div class="form-group col-xs-2">
        {!! Form::text('end_at', null, [
            'id' => 'crt-td-end-dtpckr',
            'class' => 'form-control',
            'readonly',
            'placeholder' => 'Choose a Date'
        ]) !!}
    </div>
    <div class="form-group col-xs-3">
        {!! Form::text('description', null, [
            'class' => 'form-control',
            'readonly',
            'placeholder' => 'Description about the Todo'
        ]) !!}
    </div>
    <div class="form-group col-xs-2">
        {!! Form::submit('create', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
</div>
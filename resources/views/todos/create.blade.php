<div id="tar-add-todo" class="tar-add-todo col-xs-12 clearfix">
    {!! Form::open(['action' => 'ToDosController@store', 'class' => 'navbar-form row']) !!}
    <div class="form-group col-xs-3">
        <div class="input-group">
            <div class="input-group-btn">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Importance<span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                    </li>
                    <li>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                    </li>
                    <li>
                        <span class="glyphicon glyphicon-star"></span>
                    </li>
                </ul>
            </div><!-- /btn-group -->
            {!! Form::text('content', null, ['class' => 'form-control tar-todo-content', 'placeholder' => 'Please input Todo\'s content']) !!}
        </div><!-- /input-group -->
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
        {!! Form::button('description', [
            'class' => 'form-control tar-todo-desc',
            'placeholder' => 'Description about the Todo'
        ]) !!}
    </div>
    <div class="form-group col-xs-1">
        {!! Form::submit('create', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
</div>
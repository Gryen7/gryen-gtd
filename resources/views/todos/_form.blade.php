<div class="form-group">
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Please Input Todo\'s Title']) !!}
</div>
<div class="form-group">
    {!! Form::text('time', null, [
        'id' => 'crt-td-dtpckr',
        'class' => 'form-control',
        'readonly',
        'placeholder' => 'Please Choose a Date'
    ]) !!}
</div>
<div class="form-group">
    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Please Input Some Description']) !!}
</div>

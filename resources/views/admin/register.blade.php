@extends('layouts.default')
@section('content')
    <div class="form-group">
        {!! Form::label('email','Email:') !!}
        {!! Form::text('email',null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password','Password:') !!}
        {!! Form::password('admin' , ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('confirm','Confirm:') !!}
        {!! Form::password('confirm' , ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Register' , ['class' => 'btn btn-primary form-control']) !!}
    </div>
@stop
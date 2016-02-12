@extends('layouts.default')
{{--注册页面--}}
@section('content')
    {!! Form::open(['method' => 'post' , 'url' => 'user/handleRegister']) !!}
    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email','Email:') !!}
        {!! Form::email('email',null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password','Password:') !!}
        {!! Form::password('password' , ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('confirm','Confirm:') !!}
        {!! Form::password('confirm' , ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Register' , ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop
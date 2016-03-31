@extends('layouts.default')
{{--登录页面--}}
@section('title')
    管理员登录 - @parent
@stop
@section('content')
    {!! Form::open(['method' => 'post' , 'url' => 'user/handleLogin']) !!}
    <div class="form-group">
        {!! Form::label('email','Email:') !!}
        {!! Form::text('email',null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password','Password:') !!}
        {!! Form::password('password' , ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('is_remember','Remember:') !!}
        {!! Form::checkbox('is_remember',null,false,['class'=>'form-control']) !!}
    </div>
    {!! Form::hidden('previous',$previous) !!}
    <div class="form-group">
        {!! Form::submit('Login In' , ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
    @include('errors._list')
@stop
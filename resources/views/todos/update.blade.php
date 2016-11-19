@extends('layouts._control', ['module' => 'control'])
@section('content')
    <div>
        {!! Form::open(['action' => 'ToDosController@store']) !!}
        @include('todos._form', ['submitButtonText' => 'update todo'])
        {!! Form::close() !!}
    </div>
@endsection
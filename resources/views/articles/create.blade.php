@extends('layouts._default')
@section('content')
    <div class="tar-article-form">
        {!! Form::open(['action' => 'ArticlesController@store']) !!}
        {!! Form::input('hidden','status',0) !!}
        @include('articles._form' , ['submitButtonText' => 'Submit Article','submitButtonText2' => 'Save Article'])
        {!! Form::close() !!}
    </div>
@stop
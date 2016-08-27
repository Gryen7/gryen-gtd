<div>
    {!! Form::open(['action' => 'ToDosController@store']) !!}
    @include('todos._form')
    {!! Form::close() !!}
</div>
@extends('layouts._control', ['module' => 'control'])
@section('subNavigation')
    <div class="collapse navbar-collapse">
        <form class="navbar-form navbar-left">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Search</button>
        </form>
        <div class="navbar-right">
            <button type="button" id="tar-new-todo-btn" class="btn btn-success navbar-btn">New Todo</button>
            <button type="button" class="btn btn-default navbar-btn">
                <span class="glyphicon glyphicon-object-align-bottom"></span>
            </button>
        </div>
    </div>
@endsection
@section('content')
    @include('todos.create')
    <ul class="list-unstyled tar-todo-list col-xs-12">
        @foreach($todos as $todo)
            <li class="btn-toolbar row">
                <div class="btn-group col-xs-12 row">
                    <button class="btn col-xs-1 tar-btn-select btn-{{ $todo->importanceStyle }}">
                        {!! Form::select('importance', [0=> 'TODO', 1=> 'DOING', 2=> 'DONE'], $todo->status) !!}
                    </button>
                    <button class="btn btn-default col-xs-6 tar-todo-content">{{ $todo->content }}</button>
                    <button class="btn btn-default col-xs-2">{{ $todo->begin_at }}</button>
                    <button class="btn btn-default col-xs-2">{{ $todo->end_at }}</button>
                    <button class="btn btn-danger col-xs-1 tar-del-todo" data-val="{{ $todo->id }}">Delete</button>
                </div>
            </li>
        @endforeach
    </ul>
    @include('common._modal', [
        'modalId' => 'deleteTodo' ,
        'modalContent' => 'Delete Todo?',
        'doneFunction' => 'deleteTodo'
    ])
@endsection
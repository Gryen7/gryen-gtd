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
                    <button type="button" class="btn btn-{{ $todo->importance }} col-xs-1">
                        {{ $todo->status }}
                    </button>
                    <button type="button" class="btn btn-{{ $todo->importance }} dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Todo</a></li>
                        <li><a href="#">Doing</a></li>
                        <li><a href="#">Done</a></li>
                    </ul>
                    <button class="btn btn-default col-xs-4 tar-todo-content">{{ $todo->content }}</button>
                    <button class="btn btn-default col-xs-2">{{ $todo->begin_at }}</button>
                    <button class="btn btn-default col-xs-2">{{ $todo->end_at }}</button>
                    <button class="btn btn-danger col-xs-1">Delete</button>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
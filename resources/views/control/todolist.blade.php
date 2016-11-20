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
    <ul class="list-unstyled tar-todo-list">
        @foreach($todos as $todo)
        <li class="btn-toolbar col-xs-12">
            <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    未开始
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">未开始</a></li>
                    <li><a href="#">进行中</a></li>
                    <li><a href="#">已完成</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <span class="glyphicon glyphicon-arrow-right"></span>
            </div>
            <div class="btn-group">
                <button class="btn btn-default">{{ $todo->content }}</button>
                <button class="btn btn-default">{{ $todo->begin_at }}</button>
                <button class="btn btn-default">{{ $todo->end_at }}</button>
                <button class="btn btn-default">delete</button>
            </div>
        </li>
        @endforeach
    </ul>
@endsection
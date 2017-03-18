@extends('layouts._control', ['module' => 'control'])
@section('subNavigation')
    <button type="button" id="tar-new-todo-btn" class="btn btn-success navbar-btn">新待办</button>
@endsection
@section('content')
    @include('control.todos.create')
    <ul class="list-unstyled tar-todo-list col-xs-12">
        @foreach($todos as $todo)
            <li class="btn-toolbar row">
                <div class="btn-group col-xs-12 row">
                    <button class="btn col-xs-1 tar-btn-select btn-{{ $todo->importanceStyle }}">
                        {!! Form::select('importance-' . $todo->id,
                        [0=> '未开始', 1=> '进行中', 2=> '已完成'],
                        $todo->status, ['data-id' => $todo->id]) !!}
                    </button>
                    {{ Form::input('text', 'content', $todo->content, [
                        'class' => 'btn btn-default col-xs-6 tar-todo-content',
                        'data-id' => $todo->id,
                        'readonly'
                    ]) }}
                    {{ Form::input('text', 'begin_at', $todo->begin_at, [
                        'class' => 'btn btn-default col-xs-2 tar-todo-beginat',
                        'data-id' => $todo->id,
                        'readonly'
                    ]) }}
                    {{ Form::input('text', 'end_at', $todo->end_at, [
                        'class' => 'btn btn-default col-xs-2 tar-todo-endat',
                        'data-id' => $todo->id,
                        'readonly'
                    ]) }}
                    <button class="btn btn-danger col-xs-1 tar-del-todo" data-id="{{ $todo->id }}">删除</button>
                </div>
            </li>
        @endforeach
    </ul>
    @include('control.todos._modal-del-todo', [
        'modalId' => 'deleteTodo' ,
        'modalContent' => 'Delete Todo?',
        'doneFunction' => 'deleteTodo'
    ])
@endsection
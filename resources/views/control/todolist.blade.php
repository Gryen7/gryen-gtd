@extends('layouts._control', ['module' => 'control'])
@section('subNavigation')
    <button type="button" id="tar-new-todo-btn" class="btn btn-success navbar-btn">新待办</button>
@endsection
@section('content')
    @include('control.todos.create')
    <ul class="list-unstyled tar-todo-list col-xs-12">
        @foreach($todos as $todo)
            <li class="btn-toolbar row">
                <div class="btn-group col-xs-12 row t-ctl-pertodo">
                    <button class="btn col-xs-1 tar-btn-select btn-{{ $todo->importanceStyle }}">
                        {!! Form::select('importance-' . $todo->id,
                        [0=> '未开始', 1=> '进行中'],
                        $todo->status, ['data-id' => $todo->id]) !!}
                    </button>
                    <div class="btn btn-default col-xs-6 tar-todo-content" data-id="{{ $todo->id }}">{{
                    $todo->content }} @if (!empty($todo->description))<span class="label label-info pull-right">详细</span>@endif</div>
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
                    <button class="btn btn-danger col-xs-1 tar-del-todo" data-id="{{ $todo->id }}">完成</button>
                </div>
                @if (!empty($todo->description))
                <div class="btn-group col-xs-12 row t-tdlst-desc t-tdlst-desc-{{ $todo->id }}">
                    {!! Form::textarea(null, $todo->description, ['readonly', 'class' => 'form-control no-resize']) !!}
                </div>
                @endif
            </li>
        @endforeach
    </ul>
    @include('control.todos._modal-del-todo', [
        'modalId' => 'deleteTodo' ,
        'modalContent' => 'Delete Todo?',
        'doneFunction' => 'deleteTodo'
    ])
@endsection
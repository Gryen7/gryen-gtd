@extends('layouts._control')
@section('subNavigation')
    <form class="navbar-form navbar-left">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
        <li>
            <a data-toggle="modal" data-target="#ctrl-new-todo">新任务</a>
        </li>
        <li>
            <a href=""><span class="glyphicon glyphicon-object-align-bottom"></span></a>
        </li>
    </ul>
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th></th>
                <th>日期</th>
                <th>任务描述</th>
                <th>子任务</th>
                <th>操作</th>
            </tr>
            <tr>
                <td><span><label for=""><input type="checkbox" value=""></label></span></td>
                <td><span>2016.08.16</span></td>
                <td><span>这是一条任务</span></td>
                <td><span>子任务 8</span></td>
                <td>
                    <span>
                        <a href="">delete</a>
                        <a href="">done</a>
                    </span>
                </td>
            </tr>
        </table>
    </div>
@endsection

@include('common._modal', ['modalId' => 'ctrl-new-todo', 'modalTitle' => 'New Todo'])
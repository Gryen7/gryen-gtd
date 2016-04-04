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
            <a href="">新任务</a>
        </li>
        <li>
            <a href=""><span class="glyphicon glyphicon-object-align-bottom"></span></a>
        </li>
    </ul>
@endsection
@section('content')
    <ul class="list-group">
        <li>
            <span><label for=""><input type="checkbox" value=""></label></span>
            <span>2016.08.16</span>
            <span>这是一条任务</span>
            <span>子任务 8</span>
            <span>
                <a href="">delete</a>
                <a href="">done</a>
            </span>
        </li>
        <li>
            <span><label for=""><input type="checkbox" value=""></label></span>
            <span>2016.08.16</span>
            <span>这是一条任务</span>
            <span>子任务 8</span>
            <span>
                <a href="">delete</a>
                <a href="">done</a>
            </span>
        </li>
        <li>
            <span><label for=""><input type="checkbox" value=""></label></span>
            <span>2016.08.16</span>
            <span>这是一条任务</span>
            <span>子任务 8</span>
            <span>
                <a href="">delete</a>
                <a href="">done</a>
            </span>
        </li>
    </ul>
@endsection
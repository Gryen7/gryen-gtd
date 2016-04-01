@include('control._head')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-1">
            <ul class="list-group">
                <li class="list-group-item"><a href="{{url('/control/index')}}"><img src="" alt="">Avatar</a></li>
                <li class="list-group-item"><a href="{{url('/control/index')}}"><img src="" alt="">CP</a></li>
                <li class="list-group-item"><a href="{{url('/control/articles')}}"><img src="" alt="">A</a></li>
                <li class="list-group-item"><a href="{{url('/control/comments')}}"><img src="" alt="">C</a></li>
                <li class="list-group-item"><a href="{{url('/control/todolist')}}"><img src="" alt="">TL</a></li>
                <li class="list-group-item"><a href="{{url('/control/user')}}"><img src="" alt="">U</a></li>
                <li class="list-group-item"><a href="{{url('/control/settings')}}"><img src="" alt="">S</a></li>
                <li class="list-group-item"><a href="{{url('/control/ashcan')}}"><img src="" alt="">L</a></li>
            </ul>
        </div>
        <div class="col-md-11">
            <div>Control Panel</div>
            <hr>
            <div class="navbar navbar-default"></div>
            @yield('content')
        </div>
    </div>
</div>
@include('control._foot')
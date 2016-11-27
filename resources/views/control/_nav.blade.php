<ul class="list-group">
    <li class="list-group-item text-center">
        <a href="{{url('/control/index')}}">
            <img class="img-circle" src="{{asset('img/brand80.png')}}" alt="">
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{url('/control/index')}}">
            <span class="glyphicon glyphicon-th-large"></span>Ctrl
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{ action('ControlPanelController@articles') }}">
            <span class="glyphicon glyphicon-pencil"></span>Articles
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{url('/control/comments')}}">
            <span class="glyphicon glyphicon-comment"></span>Comments
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{url('/control/todolist')}}">
            <span class="glyphicon glyphicon-list-alt"></span>TodoList
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{url('/control/user')}}">
            <span class="glyphicon glyphicon-user"></span>User
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{url('/control/settings')}}">
            <span class="glyphicon glyphicon-cog"></span>Settings
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{url('/control/ashcan')}}">
            <span class="glyphicon glyphicon-trash"></span>Trash
        </a>
    </li>
</ul>
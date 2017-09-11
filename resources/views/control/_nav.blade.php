<ul class="list-group">
    <li class="list-group-item tar-avatar">
        <a href="{{url('/control')}}">
            <img class="img-circle" src="{{ imageView2('//statics.targaryen.top/logo2.png', ['w' => 120, 'h' => 120]) }}" alt="">
        </a>
    </li>
    {{--<li class="list-group-item">--}}
        {{--<a href="{{url('/control')}}">--}}
            {{--<span class="glyphicon glyphicon-dashboard" onMouseOver="$(this).tooltip('show')" data-toggle="tooltip" data-placement="right" title="状态"></span>--}}
        {{--</a>--}}
    {{--</li>--}}
    <li class="list-group-item">
        <a href="{{url('/control/todos')}}">
            <span class="glyphicon glyphicon-tasks" onMouseOver="$(this).tooltip('show')" data-toggle="tooltip" data-placement="right" title="任务"></span>
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{ action('ControlPanelController@articles') }}">
            <span class="glyphicon glyphicon-list-alt" onMouseOver="$(this).tooltip('show')" data-toggle="tooltip" data-placement="right" title="文章"></span>
        </a>
    </li>
    {{--<li class="list-group-item">--}}
        {{--<a href="{{url('/control/user')}}">--}}
            {{--<span class="glyphicon glyphicon-user" onMouseOver="$(this).tooltip('show')" data-toggle="tooltip" data-placement="right" title="用户"></span>--}}
        {{--</a>--}}
    {{--</li>--}}
    <li class="list-group-item">
        <a href="{{url('/control/settings')}}">
            <span class="glyphicon glyphicon-cog" onMouseOver="$(this).tooltip('show')" data-toggle="tooltip" data-placement="right" title="设置"></span>
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{url('/control/ashcan')}}">
            <span class="glyphicon glyphicon-trash" onMouseOver="$(this).tooltip('show')" data-toggle="tooltip" data-placement="right" title="回收站"></span>
        </a>
    </li>
</ul>
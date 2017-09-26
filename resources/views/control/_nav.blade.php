<ul class="list-group">
    <li class="list-group-item tar-avatar">
        <a href="{{ action('ControlPanelController@me') }}">
            <img class="img-circle" src="{{ imageView2('//statics.targaryen.top/logo2.png', ['w' => 120, 'h' => 120]) }}" alt="">
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{ action('ControlPanelController@todos') }}">
            <span class="glyphicon glyphicon-list" onMouseOver="$(this).tooltip('show')" data-toggle="tooltip" data-placement="right" title="任务"></span>
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{ action('ControlPanelController@articles') }}">
            <span class="glyphicon glyphicon-list-alt" onMouseOver="$(this).tooltip('show')" data-toggle="tooltip" data-placement="right" title="文章"></span>
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{ action('ControlPanelController@pushToKindle') }}">
            <span class="glyphicon glyphicon-send" onMouseOver="$(this).tooltip('show')" data-toggle="tooltip" data-placement="right" title="发送到 Kindle"></span>
        </a>
    </li>
    <li class="list-group-item t-ctl-nav-last">
        <a href="{{ action('ControlPanelController@ashcan') }}">
            <span class="glyphicon glyphicon-trash" onMouseOver="$(this).tooltip('show')" data-toggle="tooltip" data-placement="right" title="废纸篓"></span>
        </a>
    </li>
</ul>
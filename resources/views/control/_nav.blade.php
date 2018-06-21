<ul class="list-group">
    <li class="list-group-item tar-avatar">
        <a href="{{ action('ControlPanelController@me') }}">
            <img class="img-circle" src="{{ imageView2('//statics.gryen.com/logo2.png', ['w' => 120, 'h' => 120]) }}" alt="">
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{ action('ControlPanelController@todos') }}">
            <span class="glyphicon glyphicon-list"  data-toggle="tooltip" data-placement="right" title="任务"></span>
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{ action('ControlPanelController@articles') }}">
            <span class="glyphicon glyphicon-list-alt"  data-toggle="tooltip" data-placement="right" title="文章"></span>
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{ action('ControlPanelController@pushToKindle') }}">
            <span class="glyphicon glyphicon-send"  data-toggle="tooltip" data-placement="right" title="发送到 Kindle"></span>
        </a>
    </li>
    <li class="list-group-item t-ctl-nav-last">
        <a href="{{ action('ControlPanelController@ashcan') }}">
            <span class="glyphicon glyphicon-trash"  data-toggle="tooltip" data-placement="right" title="废纸篓"></span>
        </a>
    </li>
</ul>
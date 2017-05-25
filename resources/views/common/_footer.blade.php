<footer class="navbar navbar-default t-index-ftr">
    <div class="container-fluid">
        @if (Auth::check())
            <p class="navbar-text">
                <a href="{{ action('ControlPanelController@articles') }}" class="navbar-link">站点管理</a>
            </p>
        @else
            <p class="navbar-text">
                <a href="mailto:targaryen@gryen.com‍" class="navbar-link">发电邮联系作者</a>
            </p>
        @endif
            <p class="navbar-text">
                <a href="http://www.miitbeian.gov.cn/" class="navbar-link">鲁ICP备15009847号</a>
            </p>
    </div>
</footer>
<footer class="t-index-ftr">
    <div class="container">
            <p class="navbar-text">
                @if (Auth::check())
                    <a href="{{ action('ControlPanelController@articles') }}" class="navbar-link">站点管理</a>
                    <a href="{{ action('Auth\LoginController@logout') }}" class="navbar-link">登出</a>
                @else
                    <a href="mailto:targaryen@gryen.com" class="navbar-link">发电邮联系作者</a>
                    <a href="http://www.miitbeian.gov.cn/" class="navbar-link">鲁ICP备15009847号</a>
                @endif
            </p>
    </div>
</footer>

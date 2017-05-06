<nav class="navbar navbar-default navbar-fixed-top{!! isset($extraClass) ? ' ' . $extraClass : '' !!}">
    <div class="container">
        <div class="navbar-header t-nav-brand visible-xs">
            <a href="{{ action('HomeController@index') }}" class="t-nav-btn pull-left">
                <span class="glyphicon glyphicon-home"></span>
            </a>
            <a href="{{ action('ArticlesController@index') }}" class="t-nav-btn pull-right">
                <span class="glyphicon glyphicon-list-alt"></span>
            </a>
        </div>
        <div class="collapse navbar-collapse t-nav-brand" id="tNavbarCollapse">
            <ul class="nav navbar-nav navbar-right">
                <li @if (isset($module) && $module === 'home')class="active"@endif><a href="/">首页</a></li>
                <li @if (isset($module) && $module === 'article')class="active" @endif><a href="{{url('/articles')}}">笔记</a></li>
                <li class="dropdown">
                    @if (Auth::check())
                        <a href="#" class="dropdown-toggle tar-go" data-toggle="dropdown" role="button"
                           aria-haspopup="true"
                           aria-expanded="false">设置</a>
                    @endif
                    <ul class="dropdown-menu">
                        @if (Auth::check())
                            <li><a href="{{url('/articles/create')}}">新文章</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('/control')}}">控制面板</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('/logout')}}">登出</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<nav class="navbar navbar-default navbar-static-top t-nav-brand {!! $extraClass !!}">
    <div class="container">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li @if ($module === 'home')class="active"@endif><a href="/">生活</a></li>
                <li @if ($module === 'article')class="active" @endif><a href="{{url('/articles')}}">记录</a></li>
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
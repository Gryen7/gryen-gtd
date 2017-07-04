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
                <li @if (isset($module) && $module === 'home')class="active"@endif><a href="{{ action('HomeController@index')
                }}">首页</a></li>
                <li @if (isset($module) && $module === 'article-list')class="active" @endif><a href="{{ action('ArticlesController@index')
                }}">笔记</a></li>
{{--                <li @if (isset($module) && $module === 'handicraft-list')class="active" @endif><a href="{{ action
                ('HandicraftsController@index')
                }}">手作</a></li>--}}
                @if (Auth::check())
                    <li><a href="{{url('/articles/create')}}">添加文章</a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
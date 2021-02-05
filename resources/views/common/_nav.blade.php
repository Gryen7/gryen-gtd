<nav class="navbar navbar-expand-lg navbar-light border-bottom bg-white @if(isset($extraClass) && !empty($extraClass)){{ ' ' . $extraClass }}@endif">
    <div class="container">
        <a class="navbar-brand t-navbar-brand" href="{{ action('ArticlesController@index') }}"><img src="https://statics.gryen.com/gryen_logo_20210201.png" alt="{{ env('APP_NAME') }}"></a>
        <ul class="nav navbar-nav">
            <li class="nav-item @if (isset($module) && $module === 'article-list') active @endif">
                <a class="nav-link" href="{{ action('ArticlesController@index') }}">笔记</a>
            </li>
            @if (Auth::check())
            <li class="nav-item "><a class="nav-link" href="{{url('/dashboard')}}">仪表盘</a></li>
            <li class="nav-item "><a class="nav-link" href="{{url('/articles/create')}}">添加文章</a></li>
            @endif
        </ul>
    </div><!-- /.container -->
</nav>

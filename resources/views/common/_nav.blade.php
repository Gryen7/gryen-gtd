<nav class="navbar navbar-default navbar-fixed-top @if(isset($extraClass) && !empty($extraClass)){{ ' ' . $extraClass }}@endif">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand t-navbar-brand" href="{{ action('HomeController@index') }}"><img src="{{ asset('/dist/images/logo.png') }}" alt="格安"></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tNavbarCollapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <p class="navbar-text text-center t-navbar-title" id="tNavbarTitle">@if (isset($siteTitle)){{ $siteTitle }}@endif</p>
        <div class="collapse navbar-collapse" id="tNavbarCollapse">
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
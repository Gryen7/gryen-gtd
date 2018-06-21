<nav class="navbar navbar-default navbar-fixed-top @if(isset($extraClass) && !empty($extraClass)){{ ' ' . $extraClass }}@endif">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand t-navbar-brand" href="{{ action('HomeController@index') }}"><img src="//statics.gryen.com/logo.png" alt="格安"></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tNavbarCollapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        @if (isset($siteTitle))
            <p class="navbar-text text-center t-navbar-title" id="tNavbarTitle">{{ $siteTitle }}</p>
        @endif
        <div class="collapse navbar-collapse" id="tNavbarCollapse">
            {{--@if (!isset($siteTitle))--}}
            {{--<form class="navbar-form navbar-left t-srch-form" role="search">--}}
                {{--<div class="input-group">--}}
                    {{--<input type="text" id="bdcsMain" class="form-control" placeholder="搜索……">--}}
                    {{--<span class="input-group-btn">--}}
                    {{--<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>--}}
                    {{--</span>--}}
                {{--</div>--}}
            {{--</form>--}}
            {{--@endif--}}
            <ul class="nav navbar-nav navbar-right">
                <li @if (isset($module) && $module === 'home')class="active"@endif><a href="{{ action('HomeController@index')
                }}">首页</a></li>
                <li @if (isset($module) && $module === 'article-list')class="active" @endif><a href="{{ action('ArticlesController@index')
                }}">笔记</a></li>
                @if (Auth::check())
                    <li><a href="{{url('/articles/create')}}">添加文章</a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
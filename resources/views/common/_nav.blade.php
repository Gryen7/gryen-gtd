<nav class="navbar navbar-default navbar-static-top {!! $extraClass !!}">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/home')}}">Targaryen</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            {{--<div class="navbar-form navbar-left">--}}
                {{--{!! Form::open(['action' => 'SearchesController@search']) !!}--}}
                {{--<div class="input-group">--}}
                    {{--{!! Form::input('text','search','',['class' => 'form-control','placeholder'=>'Search...']) !!}--}}
                    {{--<span class="input-group-btn">--}}
                        {{--<button class="btn btn-default" type="submit">Search</button>--}}
                    {{--</span>--}}
                {{--</div>--}}
                {{--{!! Form::close() !!}--}}
            {{--</div>--}}
            <ul class="nav navbar-nav navbar-right">
                <li @if ($module === 'home')class="active"@endif><a href="/">首页</a></li>
                <li @if ($module === 'article')class="active" @endif><a href="{{url('/articles')}}">文章</a></li>
                {{--<li @if ($module === 'about')class="active" @endif><a href="{{url('/about')}}">关于</a></li>--}}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle tar-go" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">设置</a>
                    <ul class="dropdown-menu">
                        @if (Auth::check())
                            <li><a href="{{url('/articles/create')}}">新文章</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('/control')}}">控制面板</a></li>
                            <li role="separator" class="divider"></li>
                        @endif
                        @if (Auth::check())
                            <li><a href="{{url('/logout')}}">登出</a></li>
                        @else
                            <li><a href="{{url('/login')}}">登录</a></li>
                            {{--<li><a href="{{url('/register')}}">注册</a></li>--}}
                        @endif
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
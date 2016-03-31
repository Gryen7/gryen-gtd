<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
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
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="/">Home<span class="sr-only">(current)</span></a></li>
                <li><a href="{{url('/articles')}}">Blog</a></li>
                <li><a href="{{url('/about')}}">About</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">GO!</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('/articles/create')}}">New Article</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{url('/control/index')}}">Control Panel</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{url('/user/login')}}">Login</a></li>
                        <li><a href="{{url('/user/register')}}">Register</a></li>
                        <li><a href="{{url('/user/logout')}}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@section('title')Tar-Blog
        @show</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href={{elixir('css/all.css')}}>
    <!-- Optional theme -->
    <link rel="stylesheet" href={{asset('css/bootstrap-theme.min.css')}}>
    <script data-main="js/main" src="js/require.js" defer async="true"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src={{elixir('js/all.js')}}></script>
</head>
<body>
<nav class="navbar navbar-default">
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

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home<span class="sr-only">(current)</span></a></li>
                <li><a href="{{url('/articles')}}">Articles</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Columns<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">First</a></li>
                        <li><a href="#">Second</a></li>
                        <li><a href="#">Third</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="search...">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">GO!</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('/articles/create')}}">New Article</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{url('/user/index')}}">MySpace</a></li>
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
<div class="container-fluid">
    @yield('content')
</div>
</body>
</html>
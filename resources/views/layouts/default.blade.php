<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@section('title')极简个人博客系统
    @show</title>
    <script src={{asset('js/jquery.min.js')}}></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href={{asset('css/bootstrap.min.css')}}>

    <!-- Optional theme -->
    <link rel="stylesheet" href={{asset('css/bootstrap-theme.min.css')}}>

    <!-- Latest compiled and minified JavaScript -->
    <script src={{asset('js/bootstrap.min.js')}}></script>
</head>
<body>
<div class="container">
    @yield('content')
</div>
</body>
</html>
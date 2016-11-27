<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@section('title')Tar-Blog
        @show</title>
    <link rel="stylesheet" media="screen" charset="utf-8" href={{asset('css/app.css')}}>
</head>
<body>
@section('base_content')
@show
<script type="text/javascript" src="{{asset('js/' . $module . '.js')}}"></script>
</body>
</html>

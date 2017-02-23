<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@section('title')格安 -- 生存、生活、生长
        @show</title>
    <link rel="stylesheet" media="screen" charset="utf-8" href={{asset('dist/css/lib.css')}}>
    <link rel="stylesheet" media="screen" charset="utf-8" href={{asset('dist/css/app.css')}}>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
@section('base_content')
@show
@include('common._footer')
<script type="text/javascript" src="{{asset('dist/js/manifest.bundle.js')}}"></script>
<script type="text/javascript" src="{{asset('dist/js/vendor.bundle.js')}}"></script>
<script type="text/javascript" src="{{asset('dist/js/' . $module . '.bundle.js')}}"></script>
</body>
</html>

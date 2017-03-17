<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @section('title')
            {{ isset($CONFIG->SITE_TITLE) ? $CONFIG->SITE_TITLE : 'LaravelBlog' }}
            {{ isset($CONFIG->SITE_SUB_TITLE) ? ' -- ' . $CONFIG->SITE_SUB_TITLE : '' }}
        @show
    </title>
    <link rel="stylesheet" media="screen" charset="utf-8" href={{env('STATIC_URL'). '/dist/'. env('APP_VERSION') . '/css/lib.css'}}>
    <link rel="stylesheet" media="screen" charset="utf-8" href={{env('STATIC_URL'). '/dist/'. env('APP_VERSION') . '/css/control.css'}}>

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
<script type="text/javascript" src="{{env('STATIC_URL'). '/dist/'. env('APP_VERSION') . '/js/manifest.bundle.js'}}"></script>
<script type="text/javascript" src="{{env('STATIC_URL'). '/dist/'. env('APP_VERSION') . '/js/vendor.bundle.js'}}"></script>
<script type="text/javascript" src="{{env('STATIC_URL'). '/dist/'. env('APP_VERSION') . '/js/' . $module . '.bundle.js'}}"></script>
</body>
</html>

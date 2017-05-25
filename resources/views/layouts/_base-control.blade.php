<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @section('title')
            {{ isset($CONFIG->SITE_TITLE) ? $CONFIG->SITE_TITLE : 'LaravelBlog' }}
            {{ isset($CONFIG->SITE_SUB_TITLE) ? ' - ' . $CONFIG->SITE_SUB_TITLE : '' }}
        @show
    </title>
    <link rel="stylesheet" media="screen" charset="utf-8" href={{env('STATIC_URL'). '/dist/'. config('app.version') . '/css/lib.css'}}>
    <link rel="stylesheet" media="screen" charset="utf-8" href={{env('STATIC_URL'). '/dist/'. config('app.version') . '/css/control.css'}}>

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
<script type="text/javascript" src="{{env('STATIC_URL') . '/dist/'. config('app.version') . '/js/manifest.js'}}"></script>
<script type="text/javascript" src="{{env('STATIC_URL'). '/dist/'. config('app.version') . '/js/vendor.bundle.js'}}"></script>
<script type="text/javascript" src="{{env('STATIC_URL'). '/dist/'. config('app.version') . '/js/' . $module . '.bundle.js'}}"></script>
</body>
</html>

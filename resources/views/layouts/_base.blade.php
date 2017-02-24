<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (isset($siteDescription))
        <meta name="description" content="{{ $siteDescription }}">
    @else
        <meta name="description" content="{{ isset($CONFIG->SITE_DESCRIPTION) ? $CONFIG->SITE_DESCRIPTION : 'LaravelBlog' }}">
    @endif

    @if (isset($siteKeywords))
        <meta name="keywords" content="{{ $siteKeywords }}">
    @else
        <meta name="keywords" content="{{ isset($CONFIG->SITE_KEYWORDS) ? $CONFIG->SITE_KEYWORDS : 'LaravelBlog' }}">
    @endif

        <title>
        @section('title')
            @if(isset($siteTitle) && !empty($siteTitle))
                {{ $siteTitle }} --
            @endif
                {{ isset($CONFIG->SITE_TITLE) ? $CONFIG->SITE_TITLE : 'LaravelBlog' }}
                {{ isset($CONFIG->SITE_SUB_TITLE) ? ' -- ' . $CONFIG->SITE_SUB_TITLE : '' }}
        @show
    </title>
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

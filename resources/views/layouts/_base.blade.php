<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (isset($siteKeywords))
        <meta name="keywords" content="{{ $siteKeywords }}">
    @else
        <meta name="keywords" content="{{ isset($CONFIG->SITE_KEYWORDS) ? $CONFIG->SITE_KEYWORDS : 'LaravelBlog' }}">
    @endif
    @if (isset($siteDescription))
        <meta name="description" content="{{ $siteDescription }}">
    @else
        <meta name="description"
              content="{{ isset($CONFIG->SITE_DESCRIPTION) ? $CONFIG->SITE_DESCRIPTION : 'LaravelBlog' }}">
    @endif

    <title>
        @section('title')
            @if(isset($siteTitle) && !empty($siteTitle))
                {{ $siteTitle }} -
            @endif
            {{ isset($CONFIG->SITE_TITLE) ? $CONFIG->SITE_TITLE : 'LaravelBlog' }}
            {{ isset($CONFIG->SITE_SUB_TITLE) ? ' - ' . $CONFIG->SITE_SUB_TITLE : '' }}
        @show
    </title>
    <link rel="stylesheet" media="screen" charset="utf-8" href={{env('STATIC_URL') . '/dist/' . config('app.version') . '/css/lib.css'}}>
    <link rel="stylesheet" media="screen" charset="utf-8" href={{env('STATIC_URL') . '/dist/' . config('app.version') . '/css/app.css'}}>

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
<script type="text/javascript" src="{{env('STATIC_URL') . '/dist/'. config('app.version') . '/js/manifest.js'}}"></script>
<script type="text/javascript" src="{{env('STATIC_URL') . '/dist/'. config('app.version') . '/js/vendor.bundle.js'}}"></script>
<script type="text/javascript" src="{{env('STATIC_URL') . '/dist/'. config('app.version') . '/js/common.bundle.js'}}"></script>
@if (isset($vue) && $vue)
<script type="text/javascript" src="{{env('STATIC_URL') . '/dist/'. config('app.version') . '/js/vue.bundle.js'}}"></script>
@endif
@if (isset($module))
<script type="text/javascript" src="{{env('STATIC_URL') . '/dist/'. config('app.version') . '/js/' . $module . '.bundle.js'}}"></script>
@endif
@if(env('APP_ENV') === 'production')
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-92619955-1', 'auto');
        ga('send', 'pageview');

    </script>
@endif
</body>
</html>

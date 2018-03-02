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
    <meta name="keywords" content="{{ isset($CONFIG->SITE_KEYWORDS) ? $CONFIG->SITE_KEYWORDS : env('APP_NAME') }}">
    @endif
    @if (isset($siteDescription))
    <meta name="description" content="{{ $siteDescription }}">
    @else
    <meta name="description" content="{{ isset($CONFIG->SITE_DESCRIPTION) ? $CONFIG->SITE_DESCRIPTION : env('APP_NAME')
     }}">
    @endif
    <meta name="baidu-site-verification" content="Iusb2sOx9K"/>
    <meta name="sogou_site_verification" content="0nwmiljCcG"/>
    <meta name="360-site-verification" content="653944948b9a352496e55a3b76bbae9c" />
    @if (isset($module) && $module === 'article-show')
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $article->title }}">
    <meta property="og:description" content="{{ $siteDescription }}">
    <meta property="og:image" content="{{ $article->cover }}">
    <meta property="og:url" content="{{ action('ArticlesController@show', ['id' => $article->id]) }}">
    @endif
    <title>@section('title')@if(isset($siteTitle) && !empty($siteTitle)){{ $siteTitle }} - @endif{{ isset($CONFIG->SITE_TITLE) ? $CONFIG->SITE_TITLE : env('APP_NAME') }}{{ isset($CONFIG->SITE_SUB_TITLE) ? ' - ' . $CONFIG->SITE_SUB_TITLE : '' }}@show</title>
    <link rel="alternate" href="https://www.gryen.com/" hreflang="zh-Hant" />
    <link rel="stylesheet" media="screen" charset="utf-8" href={{env('STATIC_URL') . '/dist/' . config('app.version') . '/css/lib.css'}}>
    <link rel="stylesheet" media="screen" charset="utf-8" href={{env('STATIC_URL') . '/dist/' . config('app.version') . '/css/app.css'}}>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body @if(isset($bodyClassString))class="{{ $bodyClassString }}" @endif>
@section('base_content')
@show
@include('common._footer')
<script type="text/javascript" src="{{env('STATIC_URL') . '/dist/'. config('app.version') . '/js/manifest.js'}}"></script>
<script type="text/javascript" src="{{env('STATIC_URL') . '/dist/'. config('app.version') . '/js/vendor.bundle.js'}}"></script>
<script type="text/javascript" src="{{env('STATIC_URL') . '/dist/'. config('app.version') . '/js/common.bundle.js'}}"></script>
@if (isset($vue) && $vue)
<script type="text/javascript" src="{{env('STATIC_URL') . '/dist/'. config('app.version') . '/js/vue.bundle.js'}}"></script>
@endif
@if (isset($module) && !isset($noJsLoad))
<script type="text/javascript" src="{{env('STATIC_URL') . '/dist/'. config('app.version') . '/js/' . $module . '.bundle.js'}}"></script>
@endif
@if(env('APP_ENV') === 'production')
    @if( isset($CONFIG_MANY->AC))
        @foreach($CONFIG_MANY->AC as $ac)
            {!! $ac !!}
        @endforeach
    @endif
@endif
</body>
</html>

<!doctype html>
<html lang="zh-cmn-Hans">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (isset($siteKeywords))
    <meta name="keywords" content="{{ $siteKeywords }}">
    @else
    <meta name="keywords" content="{{ env('APP_KEYWORDS') }}">
    @endif
    @if (isset($siteDescription))
    <meta name="description" content="{{ $siteDescription }}">
    @else
    <meta name="description" content="{{ env('APP_DESCRIPTION') }}">
    @endif
    @if (isset($module) && $module === 'article-show')
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{ $article->cover }}">
    <meta property="og:release_date" content="{{ $article->updated_at }}">
    <meta property="og:title" content="{{ $article->title }}">
    <meta property="og:description" content="{{ $siteDescription }}">
    <meta property="og:url" content="{{ action('ArticlesController@show', ['id' => $article->id]) }}">
    @endif
    <title>@section('title')@if(isset($siteTitle) && !empty($siteTitle)){{ $siteTitle }} - @endif{{ env('APP_NAME') }}{{ ' - ' . env('APP_SUB_TITLE') }}@show</title>
    <link rel="alternate" href="{{ env('APP_URL') }}" hreflang="zh-Hant" />
    <link rel="stylesheet prefetch" media="screen" charset="utf-8" href={{env('STATIC_URL') . '/dist/' . config('app.version') . '/css/lib.css'}} />
    <link rel="stylesheet prefetch" media="screen" charset="utf-8" href={{env('STATIC_URL') . '/dist/' . config('app.version') . '/css/app.css'}} />
    <link rel="preload" href="{{ env('SITE_DEFAULT_IMAGE') }}" as="image">
    @include('feed::links')
    <script>
        window.Laravel = <?php echo json_encode([
                                'csrfToken' => csrf_token(),
                            ]); ?>
    </script>
</head>

<body @if(isset($bodyClassString))class="{{ $bodyClassString }}" @endif>
    @include('common._nav', ['extraClass' => ''])
        <div class="container t-main" id="GryenApp">
            @yield('content')
        </div>
        @include('common._footer')
    @include('errors._list')
    @show
    <script type="text/javascript" src="{{env('STATIC_URL') . '/dist/'. config('app.version') . '/js/manifest.js'}}"></script>
    <script type="text/javascript" src="{{env('STATIC_URL') . '/dist/'. config('app.version') . '/js/vendor.js'}}"></script>
    <script type="text/javascript" src="{{env('STATIC_URL') . '/dist/'. config('app.version') . '/js/common.bundle.js'}}"></script>
    @if (isset($vue) && $vue)
    <script type="text/javascript" src="{{env('STATIC_URL') . '/dist/'. config('app.version') . '/js/publication.js'}}"></script>
    @endif
    @if (isset($module) && !isset($noJsLoad))
    <script type="text/javascript" src="{{env('STATIC_URL') . '/dist/'. config('app.version') . '/js/' . $module . '.bundle.js'}}"></script>
    @endif
</body>

</html>

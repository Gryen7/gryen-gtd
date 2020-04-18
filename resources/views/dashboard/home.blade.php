<!doctype html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>仪表盘 - {{ isset($CONFIG->SITE_TITLE) ? $CONFIG->SITE_TITLE : env('APP_NAME') }}</title>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="dashboardApp" class="container">
        <dashboard-home></dashboard-home>
    </div>
    <script type="text/javascript" src="{{env('STATIC_URL') . '/dist/'. config('app.version') . '/js/manifest.js'}}"></script>
    <script type="text/javascript" src="{{env('STATIC_URL') . '/dist/'. config('app.version') . '/js/axios.bundle.js'}}"></script>
    <script type="text/javascript"
            src="{{env('STATIC_URL') . '/dist/'. config('app.version') . '/js/dashboard.bundle.js'}}"></script>
</body>
</html>

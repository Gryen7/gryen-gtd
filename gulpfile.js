var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix.sass('app.scss');

    // 复制引用的 CSS 文件到 public/css 目录
    mix.copy([
        'node_modules/bootstrap/dist/css/bootstrap-theme.min.css',
        'node_modules/simditor/styles/simditor.css'
    ], 'public/css');

    // 复制 requirejs 的 JS 文件到 public/js 目录
    mix.copy([
        'resources/assets/js/main.js',
        'node_modules/requirejs/require.js'
    ], 'public/js');

    // 复制引用的 JS 文件到 public/vendor 目录
    mix.copy([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js'
    ], 'public/vendor');

    // 编辑器 JS 文件合并输出到 js
    mix.scripts([
        'node_modules/simple-module/lib/module.js',
        'node_modules/simple-hotkeys/lib/hotkeys.js',
        'node_modules/simple-uploader/lib/uploader.js',
        'lib/simditor.js'
    ],'public/vendor/simditor.js','node_modules/simditor')
        // 混合编写的模块下的 JS 文件
        .scripts([
        'home.js',
        'article.js',
        'user.js'
    ],'public/vendor/blog.js');

    // 合并 public/css 目录下的 CSS 文件
    mix.styles([
        'bootstrap-theme.min.css',
        'simditor.css',
        'app.css'
    ], null, 'public/css');

    // 对 CSS 文件做版本控制
    mix.version([
        'public/css/all.css'
    ]);
});
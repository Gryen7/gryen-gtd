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

    // 合并依赖的 CSS 文件到 public/vendor/css/vendor.css
    mix.styles([
        'simditor/styles/simditor.css',
        'simditor-markdown/styles/simditor-markdown.css'
    ], 'public/css/vendor.css', 'node_modules');


    mix.copy([// 复制引用的 JS 文件到 public/vendor 目录
            'node_modules/jquery/dist/jquery.min.js',
            'node_modules/bootstrap/dist/js/bootstrap.min.js'
        ], 'public/vendor')
        .copy([// 复制系统的 JS 文件到 public/js 目录
            'resources/assets/js'
        ], 'public/js')
        .copy([// 复制图片
            'resources/assets/img'
        ], 'public/img')
        .copy([// 复制 bootstrap 的字库
            'node_modules/bootstrap/fonts'
        ], 'public/fonts/bootstrap');

    mix.scripts([// 编辑器 JS 文件合并输出到 simditor.js
            'simple-module/lib/module.js',
            'simple-hotkeys/lib/hotkeys.js',
            'simple-uploader/lib/uploader.js',
            'simditor/lib/simditor.js'
        ], 'public/vendor/js/simditor.js', 'node_modules')
        .scripts([// 编辑器 markdown 支持
            'to-markdown/dist/to-markdown.js',
            'marked/lib/marked.js',
            'simditor-markdown/lib/simditor-markdown.js'
        ], 'public/vendor/js/simditor-markdown.js', 'node_modules');
});
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
    mix.browserify('main.js');

    mix.copy([// 复制图片
            'resources/assets/img'
        ], 'public/img')
        .copy([// 复制 bootstrap 的字库
            'node_modules/bootstrap-sass/assets/fonts/bootstrap'
        ], 'public/fonts/bootstrap');

    // 自动刷新
    mix.browserSync({
        proxy: 'laravelblog.app'
    });
});
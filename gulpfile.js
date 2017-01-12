//noinspection NpmUsedModulesInstalled
const elixir = require('laravel-elixir');

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
    //noinspection JSUnresolvedFunction
    mix.sass('app.scss')
        .webpack('home.js')
        .webpack('article.js')
        .webpack('control.js')
        .webpack('about.js')
        .copy([// 复制图片
        'resources/assets/img'
    ], 'public/img')
        .copy([// 复制 bootstrap 的字库
            'node_modules/bootstrap-sass/assets/fonts/bootstrap'
        ], 'public/fonts/bootstrap');
});
//noinspection NpmUsedModulesInstalled
const elixir = require('laravel-elixir');
const gulp = require('gulp');
const phplint = require('phplint').lint;

/**
 * PHP 代码检查
 * TODO 详细学习用法
 */
gulp.task('phplint', function (cb) {
    phplint(['app/**/*.php'], {limit: 10}, function (err) {
        if (err) {
            cb(err);
            process.exit(1);
        }
        cb();
    });
});

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
    mix.sass('lib.scss', 'public/dist/css/lib.css')
        .sass('app.scss', 'public/dist/css/app.css')
        .sass('control.scss', 'public/dist/css/control.css');

    mix.webpack(['home.js', 'article.js', 'control.js', 'about.js'],'./public/dist/js');

    mix.copy([// 复制图片
        'resources/assets/img'
    ], 'public/dist/img')
        .copy([// 复制 bootstrap 的字库
            'node_modules/bootstrap-sass/assets/fonts/bootstrap'
        ], 'public/dist/fonts/bootstrap');

    // mix.task('phplint', 'app/**/*.php');
});

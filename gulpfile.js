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
    mix.styles(['app.css'], null, 'public/css');

    mix.scripts([
        'home.js',
        'article.js',
        'user.js'
    ]);

    mix.copy([
        'node_modules/bootstrap/dist/css/bootstrap-theme.min.css'
    ], 'public/css');

    mix.copy([
        'resources/assets/js/main.js',
        'node_modules/requirejs/require.js'
    ], 'public/js');

    mix.copy([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js'
    ], 'public/vendor');

    mix.version([
        'public/css/all.css',
        'public/js/all.js'
    ]);
});
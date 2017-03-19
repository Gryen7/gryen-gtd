//noinspection NpmUsedModulesInstalled
const elixir = require('laravel-elixir');
const gulp = require('gulp');
const PKG = require('./package.json');

const DIST_PATH = 'public/dist';
const DIST_PATH_WITH_VERSION = `${DIST_PATH}/${PKG.version}`;
const AWESOME_FONT_PATH = 'node_modules/bootstrap-sass/assets/fonts/bootstrap/**.*';
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
    /* bootstrap 字库 */
    mix.copy(AWESOME_FONT_PATH, `${DIST_PATH}/fonts`);

    /* 复制图片 */
    mix.copy('resources/assets/img', `${DIST_PATH}/img`);

    /* CSS 处理 */
    mix.sass('lib.scss', `${DIST_PATH_WITH_VERSION}/css/lib.css`);
    mix.sass('app.scss', `${DIST_PATH_WITH_VERSION}/css/app.css`);
    mix.sass('control.scss', `${DIST_PATH_WITH_VERSION}/css/control.css`);

    /* JS 处理 */
    mix.webpack(['home.js', 'article.js', 'control.js', 'about.js'], `${DIST_PATH_WITH_VERSION}/js`);
});

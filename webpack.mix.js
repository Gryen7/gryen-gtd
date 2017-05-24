const { mix } = require('laravel-mix');

const PKG = require('./package.json');
const DIST_PATH = 'public/dist';
const DIST_PATH_WITH_VERSION = `${DIST_PATH}/${PKG.version}`;
const AWESOME_FONT_PATH = 'node_modules/bootstrap-sass/assets/fonts/bootstrap/**.*';

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
/* bootstrap 字库 */
mix.copy(AWESOME_FONT_PATH, `${DIST_PATH}/fonts`);

/* 复制图片 */
mix.copy('resources/assets/img', `${DIST_PATH}/img`);

/* CSS 处理 */
mix.sass('resources/assets/sass/lib.scss', `${DIST_PATH_WITH_VERSION}/css/lib.css`)
    .sass('resources/assets/sass/app.scss', `${DIST_PATH_WITH_VERSION}/css/app.css`)
    .sass('resources/assets/sass/control.scss', `${DIST_PATH_WITH_VERSION}/css/control.css`);

/* JS 处理 */
mix.js('resources/assets/js/home/index.js', `${DIST_PATH_WITH_VERSION}/js`);

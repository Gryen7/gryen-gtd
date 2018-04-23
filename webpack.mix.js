const fs = require('fs');

const PKG = require('./package.json');
const DIST_PATH = 'public/dist';
const DIST_PATH_WITH_VERSION = `${DIST_PATH}/${PKG.version}`;
const JS_PATH = './resources/assets/js'; // JS 源文件根目录
const JS_MODULES = fs.readdirSync(JS_PATH); // JS 模块

let mix  = require('laravel-mix');

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

/* CSS 处理 */
mix.sass('resources/assets/sass/lib.scss', `${DIST_PATH_WITH_VERSION}/css/lib.css`)
    .sass('resources/assets/sass/app.scss', `${DIST_PATH_WITH_VERSION}/css/app.css`)
    .sass('resources/assets/sass/control.scss', `${DIST_PATH_WITH_VERSION}/css/control.css`);

/* JS 处理 */
for (let module of JS_MODULES) {
    if (module !== 'helpers') {
        mix.js(`${JS_PATH}/${module}/index.js`, `${DIST_PATH_WITH_VERSION}/js/${module}.bundle.js`);
    }
}

/* Vue 处理 */
mix.js('resources/vue/index.js', `${DIST_PATH_WITH_VERSION}/js/vue.bundle.js`);

/* 公共库抽离 */
mix.extract(['jquery', 'vue'], `${DIST_PATH_WITH_VERSION}/js/vendor.bundle.js`);

/* sourceMap */
mix.sourceMaps(false);

mix.autoload({
    jquery: ['$', 'window.jQuery', 'jQuery']
});
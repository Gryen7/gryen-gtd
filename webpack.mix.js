const fs = require('fs');
const mix = require('laravel-mix');
const PKG = require('./package.json');
const tailwindcss = require('tailwindcss');

const DIST_PATH = 'public/dist';
const DIST_PATH_WITH_VERSION = `${DIST_PATH}/${PKG.version}`;
const JS_PATH = './resources/assets/js'; // JS 源文件根目录
const JS_MODULES = fs.readdirSync(JS_PATH); // JS 模块

/* CSS 处理 */
mix.sass(
    'resources/assets/sass/app.scss',
    `${DIST_PATH_WITH_VERSION}/css/app.css`
).options({
    processCssUrls: false,
    postCss: [tailwindcss('./tailwind.config.js')],
});

mix.sass(
    'resources/assets/sass/dashboard.scss',
    `${DIST_PATH_WITH_VERSION}/css/dashboard.css`
).options({
    processCssUrls: false,
    postCss: [tailwindcss('./tailwind.config.js')],
});

/* JS 处理 */
for (let module of JS_MODULES) {
    if (module !== 'helpers' && module !== '.DS_Store') {
        mix.js(
            `${JS_PATH}/${module}/index.js`,
            `${DIST_PATH_WITH_VERSION}/js/${module}.bundle.js`
        );
    }
}

mix.extract(['jquery', 'axios']).autoload({
    jquery: ['$', 'window.jQuery'],
    axios: ['axios', 'window.axios'],
});

/* Vue 处理 */
mix.js(
    'resources/vue/publication/index.js',
    `${DIST_PATH_WITH_VERSION}/js/publication.js`
).vue({ version: 3 });
mix.js(
    'resources/vue/dashboard/index.js',
    `${DIST_PATH_WITH_VERSION}/js/dashboard.js`
).vue({ version: 3 });

mix.webpackConfig({
    optimization: {
        providedExports: false,
        sideEffects: false,
        usedExports: false,
    },
})
    .before(() => {
        fs.rmdirSync(DIST_PATH, { recursive: true });
    })
    .disableNotifications()
    .browserSync({
        proxy: 'gryen.local',
        open: false,
    })
    .sourceMaps();

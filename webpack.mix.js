const fs = require("fs");
const mix = require("laravel-mix");
const PKG = require("./package.json");

const DIST_PATH = "public/dist";
const DIST_PATH_WITH_VERSION = `${DIST_PATH}/${PKG.version}`;
const JS_PATH = "./resources/assets/js"; // JS 源文件根目录
const JS_MODULES = fs.readdirSync(JS_PATH); // JS 模块

/* CSS 处理 */
mix.sass(
    "resources/assets/sass/lib.scss",
    `${DIST_PATH_WITH_VERSION}/css/lib.css`
)
    .sass(
        "resources/assets/sass/app.scss",
        `${DIST_PATH_WITH_VERSION}/css/app.css`
    )
    .sass(
        "resources/assets/sass/dashboard.scss",
        `${DIST_PATH_WITH_VERSION}/css/dashboard.css`
    );

/* JS 处理 */
for (let module of JS_MODULES) {
    if (module !== "helpers" && module !== ".DS_Store") {
        mix.js(
            `${JS_PATH}/${module}/index.js`,
            `${DIST_PATH_WITH_VERSION}/js/${module}.bundle.js`
        );
    }
}

mix.copy(
    "node_modules/vue/dist/vue.min.js",
    `${DIST_PATH_WITH_VERSION}/js/vue.min.js`
)
    .copy(
        "node_modules/jquery/dist/jquery.slim.min.js",
        `${DIST_PATH_WITH_VERSION}/js/jquery.slim.min.js`
    )
    .copy(
        "node_modules/bootstrap/dist/js/bootstrap.min.js",
        `${DIST_PATH_WITH_VERSION}/js/bootstrap.min.js`
    )
    .copy(
        "node_modules/axios/dist/axios.min.js",
        `${DIST_PATH_WITH_VERSION}/js/axios.min.js`
    );

mix.extract(["jquery", "axios", "bootstrap"]).autoload({
    jquery: ["$", "window.jQuery"]
});

/* Vue 处理 */
mix.js("resources/vue/publication/index.js", `${DIST_PATH_WITH_VERSION}/js/publication.js`).vue();
mix.js(
    "resources/vue/dashboard/index.js",
    `${DIST_PATH_WITH_VERSION}/js/dashboard.js`
).vue();

mix.webpackConfig({
    optimization: {
        providedExports: false,
        sideEffects: false,
        usedExports: false
    }
}).before(() => {
    fs.rmdirSync(DIST_PATH, { recursive: true });
});

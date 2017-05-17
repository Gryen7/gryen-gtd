/**
 * Created by targaryen on 2017/1/23.
 */
const webpack = require('webpack');
const fs = require('fs');
const _ = require('lodash');
const PKG = require('./package.json');
const JS_PATH = __dirname + '/resources/assets/js'; // JS 源文件根目录
const JS_DIST_PATH = `${__dirname}/public/dist/${PKG.version}/js`; // JS 文件输出
const jsModules = fs.readdirSync(JS_PATH); // JS 模块

// webpack 入口
let entry = {
    vendor: ['jquery', 'bootstrap-sass']
};

/**
 * 生成文件入口
 */
_.forEach(jsModules, module => {
    if (module !== 'helpers') {
        entry[module] = `${JS_PATH}/${module}/index.js`;
    }
});

//noinspection JSUnresolvedVariable
module.exports = {
    entry: entry,
    output: {
        path: JS_DIST_PATH,
        filename: '[name].bundle.js'
    },
    resolve: {
        alias: {
            'jquery': __dirname + '/node_modules/jquery/src/jquery'
        }
    },
    plugins: [
        new webpack.optimize.CommonsChunkPlugin({
            names: ['vendor', 'manifest'],
        }),
    ],
};

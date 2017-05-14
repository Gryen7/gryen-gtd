/**
 * Created by targaryen on 2017/1/23.
 */
const webpack = require('webpack');
const fs = require('fs');
const path = require('path');
const _ = require('lodash');
const JS_PATH = './resources/assets/js'; // JS 源文件根目录
const JS_DIST_PATH = './public/dist/js'; // JS 文件输出
const jsModules = fs.readdirSync(JS_PATH); // JS 模块

// webpack 入口
let entry = {
    vendor: ['jquery', 'bootstrap-sass']
};

/**
 * 生成文件入口
 */
_.forEach(jsModules, module => {
    entry[module] = path.resolve(__dirname, `${JS_PATH}/${module}/index.js`);
});

module.exports = {
    entry: entry,
    output: {
        path: path.resolve(__dirname, JS_DIST_PATH),
        filename: '[name].bundle.js'
    },
    resolve: {
        alias: {
            'jquery': path.join(__dirname, 'node_modules/jquery/src/jquery')
        }
    },
    plugins: [
        new webpack.optimize.CommonsChunkPlugin({
            names: ['vendor', 'manifest'],
        }),
    ],
};

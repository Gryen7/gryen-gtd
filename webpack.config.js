/**
 * Created by targaryen on 2017/1/23.
 */
const webpack = require('webpack');
const path = require('path');
const fs = require('fs');
const _ = require('lodash');

const JS_PATH = './resources/assets/js'; // JS 源文件根目录
const JS_MODULES = fs.readdirSync(JS_PATH); // JS 模块

// webpack 入口
let entry = {
    vendor: ['jquery', 'bootstrap-sass']
};

/**
 * 生成文件入口
 */
_.forEach(JS_MODULES, module => {
    if (module !== 'helpers') {
        entry[module] = path.resolve(JS_PATH, module, 'index.js');
    }
});

//noinspection JSUnresolvedVariable
module.exports = {
    entry: entry,
    output: {
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

/**
 * Created by targaryen on 2017/1/23.
 */
const webpack = require('webpack');
const path = require('path');

let JS_PATH = './resources/assets/js';
let JS_DIST_PATH = './public/dist/js';

module.exports = {
    entry: {
        home: path.resolve(__dirname, `${JS_PATH}/home.js`),
        article: path.resolve(__dirname, `${JS_PATH}/article.js`),
        about: path.resolve(__dirname, `${JS_PATH}/about.js`),
        control: path.resolve(__dirname, `${JS_PATH}/control.js`),
        vendor: ['jquery', 'bootstrap-sass'],
    },
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
/**
 * Created by targaryen on 2017/1/23.
 */
const webpack = require('webpack');
const path = require('path');

module.exports = {
    entry: {
        home: path.resolve(__dirname, './resources/assets/js/home.js'),
        article: path.resolve(__dirname, './resources/assets/js/article.js'),
        about: path.resolve(__dirname, './resources/assets/js/about.js'),
        control: path.resolve(__dirname, './resources/assets/js/control.js'),
        vendor: ['jquery', 'bootstrap-sass'],
        swiper: ['swiper']
    },
    output: {
        path: path.resolve(__dirname, './public/dist/js'),
        filename: '[name].bundle.js'
    },
    resolve: {
        alias: {
            'jquery': path.join(__dirname, 'node_modules/jquery/src/jquery')
        }
    },
    plugins: [
        new webpack.optimize.CommonsChunkPlugin({
            names: ['vendor', 'swiper'],
        }),
    ],
};
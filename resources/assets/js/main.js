/**
 * Created by gcy77 on 2016/3/13.
 */
require.config({
    "baseUrl": "/vendor/js",
    "paths": {
        "jquery": "jquery.min",
        "bootstrap":"bootstrap.min",
        "simditor":"simditor",
        "blog":"blog"
    },
    "shim" : {
        "bootstrap" : {
            "deps" : [ 'jquery' ],
            "exports" : 'bootstrap'
        },
        "simditor":{
            "deps":['jquery'],
            "exports":'simditor'
        },
        "blog":{
            "deps":['jquery','simditor'],
            "exports":"blog"
        }
    }
});
require(['jquery','bootstrap','simditor','blog'], function ($,bootstrap,simditor,blog) {
    blog.loadSimditor();
});
/**
 * Created by gcy77 on 2016/3/13.
 */
require.config({
    "baseUrl": "/vendor",
    "paths": {
        "jquery": "jquery.min",
        "bootstrap":"bootstrap.min"
    },
    "shim" : {
        "bootstrap" : {
            "deps" : [ 'jquery' ],
            "exports" : 'bootstrap'
        }
    }
});
require(['jquery','bootstrap'], function () {

});
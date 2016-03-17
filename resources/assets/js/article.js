/**
 * Created by gcy77 on 2016/3/17.
 */

define(function () {

    // 加载编辑器
    var loadSimditor = function () {
        var editor = new Simditor({
            textarea: $('#content')
            //optional options
        });

    };

    return {

        loadSimditor: loadSimditor

    }

});
/**
 * Created by gcy77 on 2016/3/17.
 */

define(function () {

    // 加载编辑器
    var loadSimditor = function () {
        var editor = new Simditor({
            textarea: $('#content'),
            markdown: true,
            upload: {
                url: '',
                params: null,
                fileKey: 'upload_file',
                connectionCount: 3,
                leaveConfirm: 'Uploading is in progress, are you sure to leave this page?'
            }
            //optional options
        });

    };

    return {

        loadSimditor: loadSimditor

    }

});
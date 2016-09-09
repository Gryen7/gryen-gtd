/**
 * Created by gcy77 on 2016/8/21.
 */
require('bootstrap-datetime-picker');

let cnt = $('#ctrl-new-todo');

cnt.on('show.bs.modal', () => {
    $.get('/todos/create', result => {
        cnt.find('.modal-body').html(result);

        $('#crt-td-dtpckr').datetimepicker({
            autoclose: true,
            todayBtn: true,
            minView: 1,
            linkField: 'crt-td-dtpckr',
            linkFormat: "yyyy-mm-dd"
        });
    });
});

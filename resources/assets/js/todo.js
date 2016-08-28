/**
 * Created by gcy77 on 2016/8/21.
 */
let cnt = $('#ctrl-new-todo');

cnt.on('show.bs.modal', () => {
    $.get('/todos/create', result => {
        cnt.find('.modal-body').html(result);

        require('bootstrap-datetime-picker');
        $('#crt-td-dtpckr').datetimepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayBtn: true,
            pickerPosition: "bottom-left",
            minView: 1
        });
    });
});

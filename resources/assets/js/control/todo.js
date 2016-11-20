/**
 * Created by gcy77 on 2016/8/21.
 */
require('bootstrap-datetime-picker');

$('#crt-td-strt-dtpckr').datetimepicker({
    autoclose: true,
    todayBtn: true,
    minView: 1,
    linkField: 'crt-td-dtpckr',
    linkFormat: "yyyy-mm-dd"
});

$('#crt-td-end-dtpckr').datetimepicker({
    autoclose: true,
    todayBtn: true,
    minView: 1,
    linkField: 'crt-td-dtpckr',
    linkFormat: "yyyy-mm-dd"
});

$('#tar-new-todo-btn').on('click', () => {
    let addTodoForm = $('#tar-add-todo');
    addTodoForm.slideToggle();
});
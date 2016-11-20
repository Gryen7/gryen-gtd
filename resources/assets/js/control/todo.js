/**
 * Created by gcy77 on 2016/8/21.
 */
require('bootstrap-datetime-picker');

$('#crt-td-strt-dtpckr').datetimepicker({
    format: 'yyyy-mm-dd',
    startView: 2,
    minView: 2,
    autoclose: true
});

$('#crt-td-end-dtpckr').datetimepicker({
    format: 'yyyy-mm-dd',
    startView: 2,
    minView: 2,
    autoclose: true
});

$('#tar-new-todo-btn').on('click', () => {
    let addTodoForm = $('#tar-add-todo');
    addTodoForm.slideToggle();
});
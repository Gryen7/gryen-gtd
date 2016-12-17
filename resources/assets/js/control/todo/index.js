/**
 * Created by gcy77 on 2016/8/21.
 */
require('bootstrap-datetime-picker');

let Fun = require('../function');
let DeleteTodoModal = $('#deleteTodo');

/**
 * todostart datepicker
 */
$('#crt-td-strt-dtpckr').datetimepicker({
    format: 'yyyy-mm-dd',
    startView: 2,
    minView: 2,
    autoclose: true
});

/**
 * todoend datepicker
 */
$('#crt-td-end-dtpckr').datetimepicker({
    format: 'yyyy-mm-dd',
    startView: 2,
    minView: 2,
    autoclose: true
});

/**
 * add onetodo toggle
 */
$('#tar-new-todo-btn').on('click', () => {
    let addTodoForm = $('#tar-add-todo');
    addTodoForm.slideToggle();
});

/**
 * show delete ensure modal box
 */
const showDeleteEnsure = (todoId) => {
    DeleteTodoModal.find('input[name=todo_id]').val(todoId);
    DeleteTodoModal.find(window.MODAL_ENSURE).val('deleteTodo');
    DeleteTodoModal.modal('show');
};

/**
 * delete onetodo
 */
const deleteTodo = () => {
   $.ajax({
       url: '/control/todos/delete/' + DeleteTodoModal.find('input[name=todo_id]').val(),
       method: 'GET',
       dataType: 'json',
       success: function (data) {
           if (data.code === 200) {
               DeleteTodoModal.modal('hide');
               location.reload();
           } else {
               console.log(data);
           }
       },
       error: function (error) {
           console.log(error);
       }
   });
};

/**
 * open delete onetodo ensure box
 */
$('.tar-del-todo').on('click', function () {
    showDeleteEnsure($(this).data('val'));
});

/**
 * action delete onetodo
 */
DeleteTodoModal.find('.tar-modal-ensurebtn').on('click', () => {
    eval(Fun.modalEnsureCallback(DeleteTodoModal));
});

$('select[name^="importance"]').on('change', function () {
    var todoId = $(this).data('id'),
        status = $(this).val();

    $.post('/control/todos/status', {
        id: todoId,
        status: status
    }, function (data) {
        if (data.code === 201) {
            $('button[data-val="' + todoId + '"]').click();
        }
    });
});

module.exports = {
    deleteTodo
};
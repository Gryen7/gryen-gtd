/**
 * Created by gcy77 on 2016/8/21.
 */
require('bootstrap-datetime-picker');

let DeleteTodoModal = $('#deleteTodo');
let ModalParams = $('#tar-modal-params');

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
    ModalParams.val('deleteTodo(' + todoId + ')');
    DeleteTodoModal.modal('show');
};

/**
 * delete onetodo
 * @param todoId
 */
const deleteTodo = (todoId) => {
   $.ajax({
       url: '/todos/delete/' + todoId,
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
$('#tar-modal-ensurebtn').on('click', () => {
    eval(ModalParams.val());
});

$('select[name^="importance"]').on('change', function () {
    console.log($(this).data('id'));
    console.log($(this).val());

    $.post('/todos/status', {
        id: $(this).data('id'),
        status: $(this).val()
    });
});
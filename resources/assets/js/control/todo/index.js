/**
 * Created by gcy77 on 2016/8/21.
 */
require('bootstrap-datetime-picker');
const laravelAlert = require('../../helpers/alert');
const Fun = require('../function');
const $ = require("jquery");
const DeleteTodoModal = $('#deleteTodo');
const TarTodoContent = $('.tar-todo-content');
const TarTodoBeginat = $('.tar-todo-beginat');
const TarTodoEndat = $('.tar-todo-endat');
const AddTodoForm = $('#tar-add-todo');
const TDescription = $('#tCtlDescription');
const TTdList = $('.tar-todo-list');

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
    TDescription.css('display', 'none');
    AddTodoForm.slideToggle();
});

$('#tShowDescription').on('click', () => {
    TDescription.slideToggle();
});

/**
 * 查看任务描述
 */
TarTodoContent.on('click', function (elem) {
    let Description = TTdList.find('.t-tdlst-desc-' + $(elem.currentTarget).data('id'));

    if (Description.length > 0) {
        Description.slideToggle();
    } else {
        laravelAlert.show({
            type: 'warning',
            message: '这个任务没有详细描述'
        });
    }
});

const _postDateChange = (elem) => {
    let parent = elem.parent();
    let begin = parent.find('.tar-todo-beginat').val();
    let end = parent.find('.tar-todo-endat').val();

    $.ajax({
        method: 'post',
        url: '/control/todos/date',
        data: {
            id: elem.data('id'),
            begin_at: begin,
            end_at: end
        },
        complete: function () {
            elem.datetimepicker('remove').unbind('changeDate');
            setTimeout(function () {
                location.reload();
            }, 2000);
        },
        success: function (result) {
            if (result && result.code) {
                laravelAlert.show({
                    type: result.type,
                    message: result.msg
                });
            }
        },
        error: function () {
            laravelAlert.show({
                type: 'danger',
                message: '未知错误'
            });
        }
    });
};

/**
 * change start time
 */
TarTodoBeginat.on('click', function () {
    let self = $(this);

    self.datetimepicker({
        initialDate: self.html(),
        format: 'yyyy-mm-dd',
        startView: 2,
        minView: 2,
        autoclose: true
    }).on('changeDate', function () {
        _postDateChange(self);
    });

    self.datetimepicker('show');
});

/**
 * change end time
 */
TarTodoEndat.on('click', function () {
    let self = $(this);

    self.datetimepicker({
        initialDate: self.html(),
        format: 'yyyy-mm-dd',
        startView: 2,
        minView: 2,
        autoclose: true
    }).on('changeDate', function () {
        _postDateChange(self);
    });

    self.datetimepicker('show');
});

/**
 * delete onetodo
 */
const deleteTodo = (todoId) => {
   $.ajax({
       url: '/control/todos/delete/' + todoId,
       method: 'GET',
       dataType: 'json',
       success: function (data) {
           if (data.code === 200) {
               laravelAlert.show({
                   type: 'success',
                   message: data.msg
               });
               setTimeout(function () {
                   location.reload();
               }, 1000)
           } else {
               laravelAlert.show({
                   type: 'danger',
                   message: data
               });
           }
       },
       error: function (error) {
           laravelAlert.show({
               type: 'danger',
               message: error
           });
       }
   });
};

/**
 * open delete onetodo ensure box
 */
$('.tar-del-todo').on('click', function () {
    deleteTodo($(this).data('id'));
});

/**
 * action delete onetodo
 */
DeleteTodoModal.find('.tar-modal-ensurebtn').on('click', () => {
    eval(Fun.modalEnsureCallback(DeleteTodoModal));
});

$('select[name^="importance"]').on('change', function () {
    let todoId = $(this).data('id'),
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
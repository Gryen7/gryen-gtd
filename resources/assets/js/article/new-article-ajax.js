/**
 * Created by targaryen on 16-9-3.
 */

let cna = $('#ctrl-new-article');

cna.on('show.bs.modal', () => {
    $.get('/articles/create', result => {
        cna.find('.modal-body').html(result);
    });
});

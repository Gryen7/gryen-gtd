/**
 * Created by targaryen on 16-9-3.
 */
require('./constant');
require('bootstrap-sass');

$.ajaxSetup({ headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
} });

// 侧边栏 tooltip
$('.tar-cp-nav .list-group-item span').mouseover(event => {
    $(event.currentTarget).tooltip('show');
});

require('./todo');
require('./setting');
require('./files');
require('./comments');

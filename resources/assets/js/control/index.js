/**
 * Created by targaryen on 16-9-3.
 */
require('./constant');
require('bootstrap-sass');

$.ajaxSetup({ headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
} });

require('./todo');
require('./setting');
require('./files');
require('./comments');

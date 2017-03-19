/**
 * Created by targaryen on 16-9-3.
 */
const $ = require('jquery');
require('./constant');
require('bootstrap-sass');
require('./todo');
require('./setting');
require('./files');

$.ajaxSetup({ headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
} });

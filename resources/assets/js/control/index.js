/**
 * Created by targaryen on 16-9-3.
 */

window.$ = window.jQuery = require('jquery');

require('bootstrap');
require('./todo');

$.ajaxSetup({ headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
} });

/**
 * Created by targaryen on 16-9-4.
 */

window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');

$.ajaxSetup({ headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
} });

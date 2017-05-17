/**
 * Created by targaryen on 16-9-4.
 */
const $ = window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');
require('jquery-lazyload');

$.ajaxSetup({ headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
} });

$('img.lazy').lazyload({
    skip_invisible: true
});

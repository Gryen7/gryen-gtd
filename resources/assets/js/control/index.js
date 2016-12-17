/**
 * Created by targaryen on 16-9-3.
 */

window.$ = window.jQuery = require('jquery');

require('bootstrap');
require('./todo');
require('./setting');

let cpMain = $('.tar-cp-main');
let cpMainHeight = window.screen.availHeight - 212;

$.ajaxSetup({ headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
} });

cpMain.height(cpMainHeight);

$(window).resize(function() {
    cpMain.height(cpMainHeight);
});

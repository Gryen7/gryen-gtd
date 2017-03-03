/**
 * Created by targaryen on 16-9-4.
 */

window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');

let tIndexFtr = $('.t-index-ftr');

$.ajaxSetup({ headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
} });

/**
 * 页脚调整
 */
$(function () {
    let windowHeight = $(window).height();
    let bodyHeight = $('body').height();

    if (windowHeight > bodyHeight) {
        tIndexFtr.addClass('navbar-fixed-bottom').fadeIn();
    } else {
        tIndexFtr.fadeIn();
    }
});
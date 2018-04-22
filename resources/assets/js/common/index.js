/**
 * Created by targaryen on 16-9-4.
 */
require('bootstrap-sass');
require('jquery-lazyload');

$.ajaxSetup({ headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
} });

$('img.lazy').lazyload({
    skip_invisible: true,
    threshold : 400,
    effect : "fadeIn"
});

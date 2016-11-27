/**
 * Created by targaryen on 2016/11/13.
 */

let body = $('body');
let navbar = $('.navbar');

$(window).scroll(() => {
    if(body.scrollTop() > 50) {
        navbar.removeClass('navbar-static-top').addClass('navbar-fixed-top');
        body.addClass('nav-body-70');
    } else {
        navbar.removeClass('navbar-fixed-top').addClass('navbar-static-top');
        body.removeClass('nav-body-70');
    }
});
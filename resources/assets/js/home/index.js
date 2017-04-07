require('swiper');
require('jquery-lazyload');

new Swiper('.tar-index-slider', {
    autoplay: 3000,
    speed: 2200,
    loop: true
});

$('img.lazy').lazyload({
    skip_invisible: true
});

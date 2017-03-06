require('swiper');

new Swiper('.tar-index-slider', {
    autoplay: 3000
});

let tIndexCdbox = $('#tIndexCdbox'); // 播放器容器
let tIndexAudio = $('#tIndexAudio'); // 播放器
let tIndexCdcontent = $('.t-index-cdcontent');
let $win = $(window);
let itemOffsetTop = tIndexCdcontent.offset().top;
let itemOuterHeight = tIndexCdcontent.outerHeight();
let winHeight = $win.height();

tIndexAudio.on('pause', function () {
    tIndexCdbox.addClass('t-index-cdpaused');
});

tIndexAudio.on('play', function () {
    tIndexCdbox.removeClass('t-index-cdpaused');
});

$win.scroll(function () {
    let winScrollTop = $win.scrollTop();

    if(!(winScrollTop > itemOffsetTop + itemOuterHeight) && !(winScrollTop < itemOffsetTop - winHeight)) {
        if (tIndexAudio.get(0).readyState === 4) {
            tIndexAudio.get(0).play();
        }
    } else {
        tIndexAudio.get(0).pause();
    }
})


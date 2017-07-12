/**
 * Created by targaryen on 2017/5/18.
 */
const $ = require('jquery');
const lazyload = require('jquery-lazyload');

let TBody = $('body');
let TArtclBox = $('.tar-article-box');
let Images = TArtclBox.find('img');
let TFullScreen = TBody.find('#tFullScreen');
let TFullScreenImg = TFullScreen.find('#tFullScreenImg');

$('img').lazyload({
    skip_invisible: true,
    threshold : 400,
    effect : "fadeIn"
});

/**
 * 查看原图
 */
Images.click((elem) => {
    let self = $(elem.currentTarget);

    if (self.data('status') !== 'open') {
        let src = self.attr('src').split('?')[0];

        TFullScreenImg.attr('src', src).data('status', 'open');
        TBody.addClass('t-overflowy-hidden');
        TFullScreen.css('display', 'flex').hide().fadeIn(700);
        TFullScreenImg.fadeIn(700);
    }
});

/**
 * 关闭原图查看
 */
TFullScreen.click(() => {
    TBody.removeClass('t-overflowy-hidden');
    TFullScreenImg.attr('src', '').data('status', 'close');
    TFullScreenImg.fadeOut(300);
    TFullScreen.fadeOut(300);
});
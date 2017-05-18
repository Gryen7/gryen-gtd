/**
 * Created by targaryen on 2017/5/18.
 */
const $ = require('jquery');
const lazyload = require('jquery-lazyload');

let Images = $('img');
let TFullScreen = $('#tFullScreen');
let TFullScreenImg = $('#tFullScreenImg');

/**
 * 查看原图
 */
Images.click((elem) => {
    let self = $(elem.currentTarget);

    if (self.data('status') !== 'open') {
        let src = self.attr('src').split('?')[0];

        TFullScreenImg.attr('src', src).data('status', 'open');
        TFullScreen.css('display', 'flex').hide().fadeIn(700);
        TFullScreenImg.fadeIn(700);
    }
});

/**
 * 关闭原图查看
 */
TFullScreen.click(() => {
    TFullScreenImg.data('status', 'close');
    TFullScreenImg.fadeOut(300);
    TFullScreen.fadeOut(300);
});
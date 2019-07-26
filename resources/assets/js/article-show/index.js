/**
 * Created by targaryen on 2017/5/18.
 */

import hljs from 'highlight.js/lib/highlight';
import javascript from 'highlight.js/lib/languages/javascript';
import bash from 'highlight.js/lib/languages/bash';
import php from 'highlight.js/lib/languages/php';
import python from 'highlight.js/lib/languages/python';
import scss from 'highlight.js/lib/languages/scss';
import less from 'highlight.js/lib/languages/less';
import json from 'highlight.js/lib/languages/json';

const TBody = $('body');
const TArtclBox = $('.t-rtcl-box');
const Images = TArtclBox.find('img');
const TFullScreen = TBody.find('#tFullScreen');
const TFullScreenImg = TFullScreen.find('#tFullScreenImg');

hljs.registerLanguage('javascript', javascript);
hljs.registerLanguage('bash', bash);
hljs.registerLanguage('php', php);
hljs.registerLanguage('python', python);
hljs.registerLanguage('scss', scss);
hljs.registerLanguage('less', less);
hljs.registerLanguage('json', json);
hljs.initHighlighting();

/**
 * 查看原图
 */
Images.click((elem) => {
    const self = $(elem.currentTarget);

    if (self.data('status') !== 'open') {
        const src = self.attr('src').split('?')[0];

        TFullScreenImg.attr('src', src).data('status', 'open');
        TBody.addClass('t-overflow-y-hidden');
        TFullScreen.css('display', 'flex').hide().fadeIn(700);
        TFullScreenImg.fadeIn(700);
    }
});

/**
 * 关闭原图查看
 */
TFullScreen.click(() => {
    TBody.removeClass('t-overflow-y-hidden');
    TFullScreenImg.attr('src', '').data('status', 'close');
    TFullScreenImg.fadeOut(300);
    TFullScreen.fadeOut(300);
});

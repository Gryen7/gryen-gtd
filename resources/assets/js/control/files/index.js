/**
 * Created by targaryen on 17-3-18.
 */
const $ = require('jquery');

require('jquery-lazyload');

let tCtlImage = $('#tCtlImage');
let page = 1;
let isEnd = false;
let again = true;
let lastImage; // 最后一个图片的按钮
let Window =  $(window);

/**
 * 滚动监听
 */
function tCpMainScroll() {
    let windowHeight = $(window).height();

    Window.scroll(function () {
        if ((lastImage.offset().top - (windowHeight + Window.scrollTop())) <= 0) {
            fetchImageList();
        }
    });
}

/**
 * 获取图片列表
 */
function fetchImageList() {
    if (!isEnd && again) {
        again = false; // 等待请求结束

        $.get('/control/setting/files/list/' + page, function (result) {
            let imageSize = 0;

            if (result) {
                imageSize = $(result).children().length / 2;
            }

            if (imageSize > 0) {
                tCtlImage.append(result);
                $('img.lazy').lazyload({
                    skip_invisible: true,
                    threshold : 200,
                    effect : "fadeIn"
                });
                lastImage = tCtlImage.children(':last-child');

                $('[data-toggle="popover"]').popover(); // 初始化 popover

                if (imageSize === 12) {
                    again = true;
                    page++;
                } else {
                    isEnd = true;
                }
            } else {
                isEnd = true;
            }
            tCpMainScroll();
        });
    }
}

if (tCtlImage.length > 0) {
    fetchImageList();
}

/**
 * popover 展示
 */
tCtlImage.on('click', '.t-ctl-flbx', function (elem) {
    tCtlImage.find('.t-ctl-flbx').not(elem.currentTarget).popover('destroy');
    $(elem.currentTarget).popover('toggle');
});

/**
 * popover 消失
 */
tCtlImage.on('click', function (elem) {
    if ($(elem.target).hasClass('t-ctl-fl')) {
        tCtlImage.find('.t-ctl-flbx').popover('destroy');
    }
});

/**
 * Created by gcy77 on 2016/4/2.
 */
window.onload = function () {
    adjustNavHeight();

    $(window).resize(function () {// 窗口调整大小后重新调整侧边高度
        adjustNavHeight();
    });
};

/**
 * 调整侧边栏高度
 */
const adjustNavHeight = () => {
    $('.tar-cp-nav').height($(window).height());
};

module.exports = {
    adjustNavHeight
};

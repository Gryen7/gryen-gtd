/**
 * Created by gcy77 on 2016/4/2.
 */

/**
 * 调整侧边栏高度
 */
const adjustNavHeight = () => {
    let trCpNav = $('.tar-cp-nav');

    if (trCpNav.length > 0) {
        trCpNav.height($(window).height());
    }
};

$(() => {
    adjustNavHeight();

    $(window).resize(function () {// 窗口调整大小后重新调整侧边高度
        adjustNavHeight();
    });
});
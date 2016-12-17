/**
 * Created by targaryen on 2016/12/17.
 */
let Fun = require('../../common/function');

let SetBannerBtn = $('.tar-btn-stbnr');
let SetBannerModal = $('#set-banner');

/**
 * 设置参数，弹出模态框
 */
SetBannerBtn.on('click', function () {
    setBannerModal(
        $(this).data('id'),
        'Cover For: ' + $(this).data('title')
    );
});

/**
 * 向服务端发起请求上传图片并
 */
const setBanner = (articleId) => {
    console.log(articleId);
};

/**
 * 设置并打开模态框
 * @param articleId
 * @param articleTitle
 */
const setBannerModal = (articleId, articleTitle) => {
    SetBannerModal.find('.modal-title').html(articleTitle);
    SetBannerModal.find('.tar-modal-params').val(Fun.setModalFunction('setBanner',  articleId));
    SetBannerModal.modal('show');
};

/**
 * 确认上传
 */
SetBannerModal.find('.tar-modal-ensurebtn').on('click', () => {
    eval(SetBannerModal.find('.tar-modal-params').val());
});
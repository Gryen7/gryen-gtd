/**
 * Created by targaryen on 2016/12/17.
 */

let Fun = require('../function');
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
const setBanner = () => {
    console.log('ok');
    // $.ajax({
    //     method: 'POST',
    //     data: {
    //
    //     }
    // });
};

/**
 * 设置并打开模态框
 * @param articleId
 * @param articleTitle
 */
const setBannerModal = (articleId, articleTitle) => {
    SetBannerModal.find(window.MODAL_ENSURE).val('setBanner');
    SetBannerModal.find('input[name=article_id]').val(articleId);
    SetBannerModal.find('input[name=article_title]').val(articleTitle);
    SetBannerModal.find('.modal-title').html(articleTitle);
    SetBannerModal.modal('show');
};

/**
 * 确认上传
 */
SetBannerModal.find('.tar-modal-ensurebtn').on('click', () => {
    eval(Fun.modalEnsureCallback(SetBannerModal));
});
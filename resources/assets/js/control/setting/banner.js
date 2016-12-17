/**
 * Created by targaryen on 2016/12/17.
 */
let Fun = require('../../common/function');

let SetBannerBtn = $('.tar-btn-stbnr');
let SetBannerModal = $('#set-banner');
let MyModalLabel = $('#myModalLabel');
let ModalParams = $('#tar-modal-params');

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
 * 向服务端发起请求
 */
const setBanner = (articleId) => {

};

const setBannerModal = (articleId, articleTitle) => {
    MyModalLabel.html(articleTitle);
    ModalParams.val(Fun.setModalFunction('setBanner',  articleId));
    SetBannerModal.modal('show');
};
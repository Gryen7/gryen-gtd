/**
 * Created by targaryen on 2016/12/17.
 */

let Fun = require('../function');
let Banner = $('.tar-cps-upfile');
let SetBannerBtn = $('.tar-btn-stbnr');
let SetBannerModal = $('#set-banner');
let UpPrcsTxt = $('#tar-upprcs-txt');
let UpPrcsBr = $('#tar-upprcs-br');
let UpprcsRslt = $('.tar-upbnnr-result').find('span').eq(0);
let Cover = $('input[name="cover"]');
let ArticleId = $('input[name="article_id"]');
let ArticleTitle = $('input[name="article_title"]');

/**
 * 模态框初始化
 */
SetBannerModal.init = function () {
    Banner.removeAttr('style');
    UpPrcsBr.css('width', '0%');
    UpPrcsTxt.html('0% Complete');
    UpPrcsBr.addClass('active');
    UpprcsRslt.html('');
};
/**
 * 设置参数，弹出模态框
 */
SetBannerBtn.on('click', function () {
    SetBannerModal.init();
    setBannerModal(
        $(this).data('id'),
        $(this).data('title'),
        'Cover For: ' + $(this).data('title')
    );
});

/**
 * 侦查图片上传情况    ,这个方法大概0.05-0.1秒执行一次
 */
let onprogress = (evt) => {
    let loaded = evt.loaded;                  //已经上传大小情况
    let tot = evt.total;                      //附件总大小
    let per = Math.floor(100*loaded/tot);      //已经上传的百分比
    UpPrcsBr.css('width', per + '%');
    UpPrcsTxt.html(per + '% Complete');
};

/**
 * 上传图片
 * @param file
 */
const uploadBanner = (file) => {
    let formData = new FormData();

    formData.append('upload_file', file);
    $.ajax({
        url: '/files/upload',
        method: 'POST',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        dataType: 'json',
        xhr: function () {
            let xhr = $.ajaxSettings.xhr();
            if(onprogress && xhr.upload) {
                xhr.upload.addEventListener("progress" , onprogress, false);
                return xhr;
            }
        },
        success: function (resData) {
            if (resData.success) {
                Cover.val(resData.file_path);
                UpPrcsBr.removeClass('active');
                UpprcsRslt.html('Upload Success! Please continue...');
            } else {
                UpPrcsBr.removeClass('active');
                Banner.removeAttr('style');
                UpprcsRslt.html('Upload failed! Please try again...');
            }
        },
        error: function (err) {
            UpPrcsBr.removeClass('active');
            Banner.removeAttr('style');
            UpprcsRslt.html(err.statusText);
        }
    });
};

/**
 * 选择上传的图片
 */
const choseBanner = () => {
    let fileInput = $('input[name="upload_file"]');

    fileInput.on('change', function () {
        UpPrcsBr.addClass('active');

        let file = fileInput.prop('files')[0];
        let fr = new FileReader();

        fr.readAsDataURL(file);
        fr.onload = function (e) {
            Banner.attr({'style': 'background: url(' + e.target.result + ') no-repeat'});
        };
        uploadBanner(file);
    });
};

/**
 * 向服务端发起请求设置 banner
 */
const setBanner = () => {
    if(!Cover.val()) {
        UpprcsRslt.html('No uploads, or images are being uploaded. Please wait');
        return;
    }
    $.ajax({
        url: '/control/setting/banners/set',
        method: 'POST',
        data: {
            article_id: ArticleId.val(),
            article_title: ArticleTitle.val(),
            cover: Cover.val()
        },
        dataType: 'json',
        success: function (resData) {
            if (resData.code === 200) {
                SetBannerModal.modal('hide');
                window.location.reload();
            } else if (resData.code === 403) {
                //noinspection JSUnresolvedVariable
                UpprcsRslt.html(resData.msg);
                setTimeout(function () {
                    SetBannerModal.modal('hide');
                }, 2000);
            }

        },
        error: function (err) {
            if (err.code !== 200) {
                Banner.removeClass('style');
                UpprcsRslt.html(err.statusText + ', please try again');
            }
        }
    });
};

/**
 * 设置并打开模态框
 * @param articleId
 * @param articleTitle
 * @param modalTitle
 */
const setBannerModal = (articleId, articleTitle, modalTitle) => {
    SetBannerModal.find(window.MODAL_ENSURE).val('setBanner');
    ArticleId.val(articleId);
    ArticleTitle.val(articleTitle);
    SetBannerModal.find('.modal-title').html(modalTitle);
    SetBannerModal.modal('show');
};

/**
 * 确认上传
 */
SetBannerModal.find('.tar-modal-ensurebtn').on('click', () => {
    eval(Fun.modalEnsureCallback(SetBannerModal));
});

choseBanner();
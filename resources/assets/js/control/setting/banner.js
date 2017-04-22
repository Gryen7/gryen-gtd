/**
 * Created by targaryen on 2016/12/17.
 */
const $ = require('jquery');

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
let BannerList = $('.t-ctl-bnrlist');

/**
 * 模态框初始化
 */
SetBannerModal.init = function () {
    Banner.removeAttr('style');
    UpPrcsBr.css('width', '0%');
    UpPrcsTxt.html('完成 0%');
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
        '为《' + $(this).data('title') + "》设置封面图"
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
    UpPrcsTxt.html('完成' + per + '%');
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
                UpprcsRslt.html('上传成功，点击确定设置或者取消');
            } else {
                UpPrcsBr.removeClass('active');
                Banner.removeAttr('style');
                UpprcsRslt.html('上传失败，请重试');
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
        UpprcsRslt.html('没有上传图片或者图片正在上传中，请稍等');
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
                UpprcsRslt.html(err.statusText + '，请重试');
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

/**
 * 首页推荐列表操作-置顶
 */
BannerList.on('click', '.set-top', function (elem) {
    $.post('/control/setting/banners/top/' +  $(elem.delegateTarget).data('id'), function (result) {
        if (result.code === 200) {
            window.location.reload();
        }
    });
});

/**
 * 首页推荐列表操作-删除
 */
BannerList.on('click', '.delete', function (elem) {
    $.post('/control/setting/banners/delete/' +  $(elem.delegateTarget).data('id'), function (result) {
        if (result.code === 200) {
            window.location.reload();
        }
    });
});

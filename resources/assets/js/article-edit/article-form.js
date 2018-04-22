/**
 * Created by gcy77 on 2016/3/17.
 */
require('jquery-serializejson');
const Simditor = require('tar-simditor');
const laravelAlert = require('../helpers/alert');
const upload = require('../helpers/upload');

let trArtclFrm = $('.tar-article-form');
let articleForm = trArtclFrm.find('form');
let textarea = articleForm.find('#content-textarea');

let coverInput = articleForm.find('#tCoverFile'); // 选择图片文件
let tCoverFile = articleForm.find('#tCover'); // 保存成功上传图片后的链接
let tEditCover = articleForm.find('#tEditCover'); // 封面图
let tCovrProgrs = articleForm.find('#tCovrProgrs'); // 封面图上传进度

let tTagInput = articleForm.find('#tTagInput'); // 手动输入标签的 input 组件
let tTagBox = articleForm.find('#tTagBox'); // 选中的标签存放容器
let tTags = articleForm.find('#tTags'); // 表单中要提交的标签 input
let tLblBox = articleForm.find('#tLblBox'); // 系统中的标签列表容器

let submitArticle = articleForm.find('#submit-article');
let saveArticle = articleForm.find('#save-article');

let tTagsArray = []; // 标签数组，用于判断标签数量和是否已经重复添加标签

/**
 * 加载编辑器
 */
new Simditor({
    textarea: textarea,
    markdown: false,
    toolbar: ['bold', 'italic', 'underline', 'strikethrough', 'ol', 'ul', 'blockquote', 'code', 'link', 'image', 'hr', 'alignment', 'markdown'],
    upload: {
        url: '/files/upload',
        params: null,
        fileKey: 'upload_file',
        connectionCount: 3,
        leaveConfirm: '文件正在上传中，确定离开？'
    }
});

/**
 * 发送提交或者保存文章请求
 * @param status
 * @private
 */
const _postArticle = (status) => {
    if (typeof status === 'undefined') {
        laravelAlert.show({
            type: 'danger',
            message: '不知道是提交还是仅保存'
        });
        return;
    }

    let postData = Object.assign(articleForm.serializeJSON(), {
        status: status
    });

    $.ajax({
        type: 'POST',
        url: articleForm.attr('action'),
        data: postData,
        success: function (result) {
            if (result && result.code === 200) {
                laravelAlert.show({
                    type: result.type,
                    message: result.message
                });

                if (result.href) {
                    setTimeout(function () {
                        location.href = result.href;
                    }, 500);
                }
            } else {
                laravelAlert.show({
                    type: 'danger',
                    message: '没有返回或者状态码不对'
                });
            }
        },
        error: function (xhr) {
            laravelAlert.show({
                type: 'danger',
                message: xhr.responseText
            });
        }
    });
};

/**
 * 上传进度处理
 */
const _onprogress = (evt) => {
    let percent = Math.floor(100 * evt.loaded / evt.total) + '%';

    tCovrProgrs.css('width', percent);
    tCovrProgrs.find('span').html('封面图上传完成' + percent);
};

/**
 * 上传封面图成功
 * @param result
 * @private
 */
const _upCoverSuccess = (result) => {
    coverInput.val(null);
    tCovrProgrs.removeClass('active');
    tCoverFile.val(result.file_path);
    tEditCover.attr('src',  result.file_path + '?imageView2/1/interlace/1/w/443/h/295/q/95');
};

/**
 * 上传封面图失败
 * @private
 */
const _upCoverError = () => {
    coverInput.val(null);
    laravelAlert.show({
        type: 'danger',
        massage: '上传失败！'
    });
};

/**
 * 标签重新计算
 * @returns {Array}
 */
const _tTagBoxTagsToString = () => {
    let tTagsArray = [];
    let tTagBoxTags = tTagBox.find('.t-tag');

    tTagBoxTags.each((index, elem) => {
        tTagsArray.push($(elem).text());
    });

    return tTagsArray;
};


/**
 * 发表文章
 */
submitArticle.click(() => {
    _postArticle(1);
});

/**
 * 保存文章
 */
saveArticle.click(() => {
    _postArticle(0);
});

/**
 * 选择封面图触发上传操作
 */
coverInput.on('change', function () {
    let cover = coverInput.prop('files')[0];

    upload(cover, {
        paramName: 'cover',
        url: '/articles/cover/upload'
    }, _upCoverSuccess, _upCoverError, _onprogress);
});

/**
 * 点选添加标签
 */
tLblBox.find('.t-tag').on('click', function () {
    let tag = $.trim($(this).text());

    if (tTagBox.children().length > 7) {
        laravelAlert.show({
            type: 'warning',
            message: '标签最多 7 个'
        });
        return;
    }

    if ($.inArray(tag, tTagsArray) > -1) {
        laravelAlert.show({
            type: 'warning',
            message: `[${tag}]已经添加过了`
        });
        return;
    }

    tTagBox.append($(this));
    tTagsArray = _tTagBoxTagsToString();
    tTags.val(tTagsArray.join(','));
});

/**
 * 输入框添加标签
 * 删除标签
 */

tTagInput.keydown(event => {
    // 添加标签
    if (event.which === 9) {
        if (tTagInput.is(":focus") && tTagInput.val().length > 0 && tTagBox.children().length < 7) {
            let tag = $.trim(tTagInput.val());

            if ($.inArray(tTagInput.val(), tTagsArray) < 0) {
                tTagBox.append(`<span class="t-tag label label-default">${tag}</span>`);
                tTagsArray = _tTagBoxTagsToString();
                tTags.val(tTagsArray.join(','));
            } else {
                laravelAlert.show({
                    type: 'warning',
                    message: '已经添加过了'
                });
            }
        } else {
            laravelAlert.show({
                type: 'danger',
                message: '已经添加过了'
            });
        }
        tTagInput.val(null);
        return false;
    }

    // 删除标签
    if (tTagInput.val().length < 1 && event.which === 8) {
        let tags = tTagBox.children();

        if (tags.length > 0) {
            let lastChild = tags.eq(tags.length - 1);

            if (lastChild.hasClass('t-tag')) {
                tLblBox.append(lastChild);
            } else {
                tags.eq(tags.length - 1).remove();
            }
            tTagsArray = _tTagBoxTagsToString();
            tTags.val(tTagsArray.join(','));
        } else {
            laravelAlert.show({
                type: 'warning',
                message: '没有标签'
            });
        }
        return false;
    }
});

$(() => {
    $('.navbar-default').fadeOut();
});
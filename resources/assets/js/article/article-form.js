/**
 * Created by gcy77 on 2016/3/17.
 */
const $ = require('jquery');

let textarea = $('#content-textarea');
let trArtclFrm = $('.tar-article-form');
let trArtTtlBox = $('.tar-artl-ttlbox');
let trArtTtl = trArtTtlBox.html();
let coverInput = $('#tCover');
let tEditCover = $('.t-edit-cover'); // 封面图
let tTagInput = $('#tTagInput'); // 手动输入标签
let tTagBox = $('#tTagBox'); // 选中的标签
let tTag = $('.t-tag'); // 标签
let tTags = $('#tTags'); // 要提交的标签
let tOTags = $('#tOTags'); // 自己添加的标签
let tTagsValue = {}; // 点选的标签对象
let tTagsArray = []; // 点选的标签数组
let oTagsArray = []; // 输入的标签数组

trArtTtlBox.html(null);

/**
 * 加载编辑器
 */
if (textarea.length > 0) {
    //noinspection NpmUsedModulesInstalled
    require('simple-module');
    require('simple-hotkeys');
    //noinspection NpmUsedModulesInstalled
    require('simple-uploader');
    require('to-markdown');
    require('marked');
    require('simditor-markdown');

    let Simditor = require('simditor');

    new Simditor({
        textarea: textarea,
        markdown: false,
        toolbar: ['bold', 'italic', 'underline', 'strikethrough', 'ol', 'ul', 'blockquote', 'code', 'link', 'image', 'hr', 'indent', 'outdent', 'alignment', 'markdown'],
        upload: {
            url: '/files/upload',
            params: null,
            fileKey: 'upload_file',
            connectionCount: 3,
            leaveConfirm: 'Uploading is in progress, are you sure to leave this page?'
        }
    });

    let simditorBody = trArtclFrm.find('.simditor-placeholder');

    simditorBody.before(trArtTtl);
}

/**
 * 提交或者保存文章
 */
if (trArtclFrm.length > 0) {
    let articleForm = trArtclFrm.find('form').find('[name = "status"]');
    let submitArticle = $('#submit-article');
    let saveArticle = $('#save-article');

    submitArticle.click(() => {
        articleForm.val(1).end().submit();
    });

    saveArticle.click(() => {
        articleForm.val(0).end().submit();
    });
}

/**
 * 文章封面图处理
 */
coverInput.on('change', function () {
    let cover = coverInput.prop('files')[0];

    let fr = new FileReader();

    fr.readAsDataURL(cover);
    fr.onload = function (e) {
        tEditCover.attr({'style': 'background: url(' + e.target.result + ') no-repeat;background-size: cover;'});
    };

});

/**
 * 点选添加标签
 */
tTag.on('click', function () {
    if (tTagBox.children().length >= 4) {
        console.log('最多 4 个标签'); // TODO 给出提示
    } else {
        let thisTagName = $(this).text();

        if ($.inArray(thisTagName, oTagsArray) < 0) {
            tTagBox.append($(this));

            $.each(tTagBox.children(), function (index, value) {
                let tagName = $(value).text();

                if ($(value).data('id')) {
                    tTagsValue[$(value).data('id')] = tagName;
                    tTagsArray.push(tagName);
                }

            });
        } else {
            console.log('tag is existed');
        }

        tTags.val(JSON.stringify(tTagsValue));
    }
});

/**
 * 鼠标点击事件监听
 * 输入框添加标签处理
 */

$(document).click(function () {
    if (tTagInput.is(':focus')) {
        $(document).keypress(function (e) {
            console.log(e.which);
            if (e.which === 13) {
                if (tTagBox.children().length >= 4) {
                    tTagInput.val('');
                    console.log('最多 4 个标签'); // TODO 给出提示
                } else {
                    if ($.inArray(tTagInput.val(), oTagsArray) < 0 &&
                        $.inArray(tTagInput.val(), tTagsArray) < 0) {
                        tOTags.val(tOTags.val() + tTagInput.val() + ',');
                        tTagBox.append('<span class="t-tag label label-default">' + tTagInput.val() + '</span>');
                        tTagInput.val('');
                    } else {
                        console.log('tag is existed');
                        tTagInput.val('');
                    }

                    oTagsArray = tOTags.val().split(",");
                }
            }
        });
    }
    tTagInput.removeAttr("onfocus");
});

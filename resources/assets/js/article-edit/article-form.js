/**
 * Created by gcy77 on 2016/3/17.
 */
const $ = require('jquery');
require('tar-simditor-markdown');
const Simditor = require('tar-simditor');

let textarea = $('#content-textarea');
let trArtclFrm = $('.tar-article-form');
let trArtTtlBox = $('.tar-artl-ttlbox');
let coverInput = $('#tCover');
let tEditCover = $('#tEditCover'); // 封面图
let tTagInput = $('#tTagInput'); // 手动输入标签的 INPUT 组件
let tTagBox = $('#tTagBox'); // 选中的标签存放容器
let tTag = $('.t-tag'); // 标签
let tTags = $('#tTags'); // 要提交的标签
let tTagsArray = []; // 标签数组
let tLblBox = $('#tLblBox'); // 系统中的标签

trArtTtlBox.html(null);

/**
 * 加载编辑器
 */
if (textarea.length > 0) {
    new Simditor({
        textarea: textarea,
        markdown: false,
        toolbar: ['bold', 'italic', 'underline', 'strikethrough', 'ol', 'ul', 'blockquote', 'code', 'link', 'image', 'hr', 'indent', 'outdent', 'alignment', 'markdown'],
        upload: {
            url: '/files/upload',
            params: null,
            fileKey: 'upload_file',
            connectionCount: 3,
            leaveConfirm: '文件正在上传中，确定离开？'
        }
    });
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
        tEditCover.attr('src', e.target.result);
    };
});

/**
 * 点选添加标签
 */
tTag.on('click', function () {
    let tag = $.trim($(this).text());

    if (tTagBox.children().length < 7 && $.inArray(tag, tTagsArray) < 0) {
        tTagsArray.push(tag);
        tTagBox.append($(this));
        tTags.val(tTagsArray.join(','));
    } else {
        console.log('标签最多 7 个！');
    }
});

/**
 * 鼠标点击事件监听
 * 输入框添加标签处理
 */

tTagInput.keydown(function (e) {
    // 添加标签
    if (e.which === 9) {
        if (tTagInput.is(":focus") && tTagInput.val().length > 0 && tTagBox.children().length < 7) {
            let tag = $.trim(tTagInput.val());

            if ($.inArray(tTagInput.val(), tTagsArray) < 0) {
                tTagBox.append(`<span class="t-input-tag label label-default">${tag}</span>`);
                tTagsArray.push(tag);
                tTags.val(tTagsArray.join(','));
            } else {
                console.log('已经添加过了！');
            }
        } else {
            console.log('输入不合法！');
        }
        tTagInput.val(null);
        return false;
    }

    // 删除标签
    if (tTagInput.val().length < 1 && e.which === 8) {
        let tags = tTagBox.children();

        if (tags.length > 0) {
            let lastChild = tags.eq(tags.length - 1);

            if (lastChild.hasClass('t-tag')) {
                tLblBox.append(lastChild);
            } else {
                tags.eq(tags.length - 1).remove();
            }
            tTagsArray.pop();
            tTags.val(tTagsArray.join(','));
        } else {
            console.log('没有标签！');
        }
        return false;
    }
});

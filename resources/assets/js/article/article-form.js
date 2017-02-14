/**
 * Created by gcy77 on 2016/3/17.
 */

let textarea = $('#content-textarea');
let trArtclFrm = $('.tar-article-form');
let trArtTtlBox = $('.tar-artl-ttlbox');
let trArtTtl = trArtTtlBox.html();
let coverInput = $('#tCover');
let tEditCover = $('.t-edit-cover');

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

coverInput.on('change', function () {
    let cover = coverInput.prop('files')[0];

    let fr = new FileReader();

    fr.readAsDataURL(cover);
    fr.onload = function (e) {
        tEditCover.attr({'style': 'background: url(' + e.target.result + ') no-repeat;background-size: cover;'});
    };

});

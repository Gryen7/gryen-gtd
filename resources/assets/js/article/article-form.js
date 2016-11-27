/**
 * Created by gcy77 on 2016/3/17.
 */

/**
 * 加载编辑器
 */
$(() => {
    let textarea = $('#content-textarea');

    if (textarea.length > 0) {
        require('simple-module');
        require('simple-hotkeys');
        require('simple-uploader');
        require('to-markdown');
        require('marked');
        require('simditor-markdown');

        let Simditor = require('simditor');

        new Simditor({
            textarea: textarea,
            markdown: false,
            toolbar: ['title', 'bold', 'italic', 'underline', 'strikethrough', 'ol', 'ul', 'blockquote', 'code', 'link', 'image', 'hr', 'indent', 'outdent', 'alignment', 'markdown'],
            upload: {
                url: '/files/upload',
                params: null,
                fileKey: 'upload_file',
                connectionCount: 3,
                leaveConfirm: 'Uploading is in progress, are you sure to leave this page?'
            }
        });
    }
});

/**
 * 提交或者保存文章
 */
$(() => {
    let trArtclFrm = $('.tar-article-form');

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
});
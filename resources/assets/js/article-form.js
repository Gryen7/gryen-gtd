/**
 * Created by gcy77 on 2016/3/17.
 */
require('simple-module');
require('simple-hotkeys');
require('simple-uploader');
const Simditor = require('simditor');
require('to-markdown');
require('marked');
require('simditor-markdown');

/**
 * 加载编辑器
 */
$(() => {
    new Simditor({
        textarea: $('#content'),
        markdown: true,
        toolbar: ['title', 'bold', 'italic', 'underline', 'strikethrough', 'ol', 'ul', 'blockquote', 'code', 'link', 'image', 'hr', 'indent', 'outdent', 'alignment', 'markdown'],
        upload: {
            url: '/files/upload',
            params: null,
            fileKey: 'upload_file',
            connectionCount: 3,
            leaveConfirm: 'Uploading is in progress, are you sure to leave this page?'
        }
    });
});

/**
 * 保存草稿或者直接发表文章
 * @param status
 */
const saveOrSubmitArticle = status => {
    var articleForm = $('.tar-article-form').find('form').find('[name = "status"]');
    articleForm.val(status);
    articleForm.end().submit();
};

module.exports = {
    saveOrSubmitArticle
};
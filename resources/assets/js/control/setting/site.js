/**
 * Created by targaryen on 2017/2/23.
 */
const $ = require('jquery');

let siteTitle = $('#siteTitle');
let siteSubTitle = $('#siteSubTitle');
let siteTitleBtn = $('#siteTitleBtn');
let siteSubTitleBtn = $('#siteSubTitleBtn');

/**
 * 设置站点标题
 */
siteTitleBtn.click(function () {
    if (siteTitle.val().length > 0) {
        $.post('/control/setting/site/title', {title: siteTitle.val()});
    }
});

siteSubTitleBtn.click(function () {
    if (siteSubTitle.val().length > 0) {
        $.post('/control/setting/site/subtitle', {sub_title: siteSubTitle.val()});
    }
});
/**
 * Created by targaryen on 2017/2/23.
 */
const $ = require('jquery');

let siteTitle = $('#siteTitle');
let siteTitleBtn = $('#siteTitleBtn');

let siteSubTitle = $('#siteSubTitle');
let siteSubTitleBtn = $('#siteSubTitleBtn');

let siteKeywords = $('#siteKeywords');
let siteKeywordsBtn = $('#siteKeywordsBtn');

let siteDescription = $('#siteDescription');
let siteDescriptionBtn = $('#siteDescriptionBtn');

/**
 * 设置站点标题
 */
siteTitleBtn.click(function () {
    if (siteTitle.val().length > 0) {
        $.post('/control/setting/site/title', {title: siteTitle.val()});
    }
});

/**
 * 设置站点副标题
 */
siteSubTitleBtn.click(function () {
    if (siteSubTitle.val().length > 0) {
        $.post('/control/setting/site/subtitle', {sub_title: siteSubTitle.val()});
    }
});

/**
 * 设置站点默认关键字
 */
siteKeywordsBtn.click(function () {
    if (siteKeywords.val().length > 0) {
        $.post('/control/setting/site/keywords', {keywords: siteKeywords.val()});
    }
});

/**
 * 设置站点默认描述
 */
siteDescriptionBtn.click(function () {
    if (siteDescription.val().length > 0) {
        $.post('/control/setting/site/description', {description: siteDescription.val()});
    }
});
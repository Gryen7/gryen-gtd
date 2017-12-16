/**
 * Created by targaryen on 2017/2/23.
 */
const $ = require('jquery');
const laravelAlert = require('../../helpers/alert');

let siteTitle = $('#siteTitle');
let siteTitleBtn = $('#siteTitleBtn');

let siteSubTitle = $('#siteSubTitle');
let siteSubTitleBtn = $('#siteSubTitleBtn');

let siteKeywords = $('#siteKeywords');
let siteKeywordsBtn = $('#siteKeywordsBtn');

let siteDescription = $('#siteDescription');
let siteDescriptionBtn = $('#siteDescriptionBtn');

let siteDefaultImage = $('#siteDefaultImage');
let siteDefaultImageBtn = $('#siteDefaultImageBtn');

let acDelBtn = $('.t-ac-del');
let collapseAnalyticsCode = $('#collapseAnalyticsCode');
let acDelActn = collapseAnalyticsCode.data('delac');

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

/**
 * 设置站点默认图片
 */
siteDefaultImageBtn.click(function () {
    if (siteDefaultImage.val().length > 0) {
        $.post('/control/setting/site/defaultimage', {default_image: siteDefaultImage.val()});
    }
});

/**
 * 删除统计代码
 */
acDelBtn.click(function (event) {
    let acId = $(event.currentTarget).data('id');

    $.post(acDelActn, {id: acId}, function (result) {
        if (result && result.code === 200) {
            laravelAlert.show({
                type: result.type,
                message: result.message
            });

            setTimeout(function () {
                location.href = result.href;
            }, 500);
        } else {
            laravelAlert.show({
                type: 'danger',
                message: '稍后再试！'
            });
        }
    });
});

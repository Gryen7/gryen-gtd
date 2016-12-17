/**
 * 公共方法
 * Created by targaryen on 2016/12/17.
 */

/**
 * 模态框回调函数处理
 * @param modalId
 * @returns {string}
 */
const modalEnsureCallback = (modalId) => {
    return modalId.find(window.MODAL_ENSURE).val() + '()';
};

module.exports = {
    modalEnsureCallback
};
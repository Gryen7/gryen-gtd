/**
 * Created by targaryen on 2016/12/17.
 */

const modalEnsureCallback = (modalId) => {
    eval(modalId.find(window.MODAL_ENSURE).val() + '()');
};

module.exports = {
    modalEnsureCallback
};
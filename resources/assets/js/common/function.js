/**
 * Created by targaryen on 2016/12/17.
 */
let $ = require('jquery');
/**
 * 设置模态框的回调方法和参数
 * @param funName
 * @param params
 * @returns {string}
 */
const setModalFunction = (funName, params) => {
    if ($.isArray(params)) {
        return funName + '(' + params.join(',') + ')';
    } else {
        return funName + '(' + params + ')';
    }
};

module.exports = {
  setModalFunction
};
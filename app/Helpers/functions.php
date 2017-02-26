<?php
/**
 * Created by PhpStorm.
 * User: targaryen
 * Date: 2017/2/26
 * Time: 上午11:41
 */

/* ------------------------------------------------------------ */
/* ---------------------- 自定义全局函数 ----------------------- */
/* ------------------------------------------------------------ */


/**
 * 对应七牛 imageView2 图片处理接口
 * @param string $image
 * @param array $params
 * @param int $mode
 * @return string
 */
function imageView2(string $image, array $params, $mode = 1) {
    $queryString = '?imageView2/' . $mode;

    if (empty($image)) {
        return '';
    }

    if (empty($params) || count($params) <= 0) {
        return $image;
    }

    foreach ($params as $key => $value) {
        $queryString .= '/' . $key . '/' . $value;
    }

    return $image . $queryString;
}
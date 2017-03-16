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
 * @param string $image 图片原始路径
 * @param array $params 参数
 * @param int $mode 图片处理模式
 * @param int $q 图片质量
 * @return string
 */
function imageView2(string $image, array $params, $mode = 1, $q = 80)
{
    $queryString = '?imageView2/' . $mode;

    // 允许的参数
    $allowParams = ['w', 'h', 'format', 'interlace'];

    if (empty($image)) {
        return '';
    }

    if (empty($params) || count($params) <= 0) {
        return $image;
    }

    foreach ($params as $key => $value) {
        if (in_array($key, $allowParams)) {
            $queryString .= '/' . $key . '/' . $value;
        }
    }

    $image = str_replace('//static.', '//statics.', $image);

    return $image . $queryString . '/q/' . $q;
}
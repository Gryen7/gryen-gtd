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
function imageView2($image, array $params, $mode = 1, $q = 95)
{
    if (!is_string($image)) {
        return '';
    }

    if (empty($image) || strpos($image, '?') || empty($params) || count($params) <= 0) {
        return $image;
    }

    $queryString = '?imageView2/' . $mode . '/interlace/1';

    // 允许的参数
    $allowParams = ['w', 'h'];

    foreach ($params as $key => $value) {
        if (in_array($key, $allowParams)) {
            $queryString .= '/' . $key . '/' . $value;
        }
    }

    $image = str_replace('//static.', '//statics.', $image);

    return $image . $queryString . '/q/' . $q;
}

/**
 * 获取 package.json 对象
 * @return mixed
 */
function package() {
    $packageFilePath = base_path() . '/package.json';
    return json_decode(file_get_contents($packageFilePath));
}

/**
 * 获取版本
 * @return string
 */
function version() {
    return isset(package()->version) ? package()->version : '0.0.1';
}

/**
 * 动态处理文章中的图片
 * @param $content
 * @return mixed
 */
function handleContentImage($content) {
    preg_match_all('/<img.*?src="(.*?)".*?>/is', $content, $result);
    $rightSrcs = [];
    foreach ($result[1] as $value) {
        array_push($rightSrcs, imageView2($value, ['w' => 600], 0, '100'));
    }
    return str_replace($result[1], $rightSrcs, $content);
}
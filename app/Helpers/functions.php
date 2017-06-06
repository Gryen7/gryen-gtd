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
function imageView2($image, array $params, $mode = 1, $q = 100)
{
    if (!is_string($image)) {
        return '';
    }

    if (empty($image) || strpos($image, '?')) {
        return $image;
    }

    $queryString = '';

    // 允许的参数
    $allowParams = ['w', 'h'];

    if (isset($params) && !empty($params)) {
        $queryString .= '?imageView2/' . $mode . '/interlace/1';
        foreach ($params as $key => $value) {
            if (in_array($key, $allowParams)) {
                $queryString .= '/' . $key . '/' . $value;
            }
        }
    }

    $image = str_replace('//static.', '//statics.', $image);

    // 质量处理
    $qhandle = '';

    if ($q != 100) {
        $qhandle = '/q/' . $q;
    }

    return $image . $queryString . $qhandle;
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
 * 添加或者删除七牛图片处理参数
 * @param $content
 * @param int $mode 1：添加参数 2：去除参数
 * @return mixed
 */
function handleContentImage($content, $mode = 1) {
    preg_match_all('/<img.*?src="(.*?)".*?>/is', $content, $result);
    $rightSrcs = [];

    switch ($mode) {
        case 1: // 添加参数
            foreach ($result[1] as $value) {
                array_push($rightSrcs, imageView2($value, [], 0, '100'));
            }
            break;
        case 2: // 去除参数
            foreach ($result[1] as $value) {
                $imageCut = explode('?', $value);
                array_push($rightSrcs, $imageCut[0]);
            }
            break;
        default:
            break;
    }

    return str_replace($result[1], $rightSrcs, $content);
}
<?php

namespace App;

class Analytics extends ConfigMany
{

    private static $group = 'AC';
    private static $group_name = '分析代码';

    /**
     * 分析代码添加
     * @param $analytics
     */
    public static function addAnalyticsCode($analytics)
    {
        ConfigMany::create(array_merge($analytics, [
            'group' => Analytics::$group,
            'group_name' => Analytics::$group_name
        ]));
    }


    /**
     * @param null $config
     * @param int $status
     * @return array
     */
    public static function getAnalyticsCode($config = null, $status = 0)
    {
        $where = [
            'group' => Analytics::$group,
            'status' => $status
        ];

        if ($config) {
            $where['config'] = $config;
        }

        return ConfigMany::where($where)->get();
    }

    /**
     * 删除分析代码
     * @param array|int $ids
     * @return int
     */
    public static function destroy($ids)
    {
        return ConfigMany::destroy($ids);
    }
}

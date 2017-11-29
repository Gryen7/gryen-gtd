<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfigMany extends Model
{

    protected $fillable = [
        'group',
        'group_name',
        'config',
        'config_name',
        'config_value',
        'status',
        'description'
    ];

    /**
     * 分析代码添加
     * @param $analyticsCodeName
     * @param $analyticsCode
     */
    public static function addAnalyticsCode($analyticsCodeName, $analyticsCode)
    {
        ConfigMany::updateOrCreate([
            'name' => 'analyticsCodeName'
        ]);
    }

    public static function getAnalyticsCode()
    {
        return [];
    }
}

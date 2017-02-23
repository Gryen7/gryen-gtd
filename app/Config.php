<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = [
        'name',
        'value',
        'description',
        'status'
    ];

    public $timestamps = false;

    /**
     * 获取全部配置
     * @return object
     */
    public static function getAllConfig()
    {
        $config = [];
        foreach (self::all() as $value) {
            $config[$value->name] = $value->value;
        }

        return (object)$config;
    }

    /**
     * 设置站点标题
     * @param $siteTitle
     */
    public static function setSiteTitle($siteTitle)
    {
        return self::updateOrCreate([
            'name' => 'SITE_TITLE',
            'value' => $siteTitle
        ]);
    }

    /**
     * 设置站点副标题
     * @param $siteSubTitle
     * @return mixed
     */
    public static function setSiteSubTitle($siteSubTitle)
    {
        return self::updateOrCreate([
            'name' => 'SITE_SUB_TITLE',
            'value' => $siteSubTitle
        ]);
    }
}

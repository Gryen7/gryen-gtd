<?php

namespace App;

use Redis;
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
        $returnConfig = [];

        $redis = Redis::connection();

        if ($redis) {
            $redisConfig = $redis->get('CONFIG');
        }

        if (empty($redisConfig)) {
            $config = self::all();
            foreach ($config as $value) {
                $returnConfig[$value->name] = $value->value;
            }

            if ($redis) {
                $redis->set('CONFIG', json_encode($returnConfig));
            }

        } else {
            $returnConfig = json_decode($redisConfig, true);
        }

        return (object)$returnConfig;
    }

    /**
     * 设置站点标题
     * @param $siteTitle
     */
    public static function setSiteTitle($siteTitle)
    {
        $redis = Redis::connection();
        $config = json_decode($redis->get('CONFIG'));
        $config->SITE_TITLE = $siteTitle;
        $redis->set('CONFIG', json_encode($config));
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

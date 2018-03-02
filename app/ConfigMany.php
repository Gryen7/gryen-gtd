<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ConfigMany
 *
 * @property int $id
 * @property string $group
 * @property string $group_name
 * @property string $config
 * @property string $config_name
 * @property string $config_value
 * @property int $status
 * @property string $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConfigMany whereConfig($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConfigMany whereConfigName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConfigMany whereConfigValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConfigMany whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConfigMany whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConfigMany whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConfigMany whereGroupName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConfigMany whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConfigMany whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ConfigMany whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
     * @return mixed|object
     * @throws \Exception
     */
    public static function getAllConfig()
    {
        $returnConfig = [];
        $cachedConfig = json_decode(cache('CONFIG_MANY'), true);

        if (empty($cachedConfig)) {
            $configMany = ConfigMany::all();
            foreach ($configMany as $value) {
                if ($value) {
                    $returnConfig[$value->group][$value->config] = $value->config_value;
                }
            }
            cache(['CONFIG_MANY' => json_encode($returnConfig)], env('CACHE_DURATION'));
        } else {
            $returnConfig = $cachedConfig;
        }

        if (empty($key)) {
            return (object)$returnConfig;
        } else {
            return $returnConfig[$key];
        }
    }
}

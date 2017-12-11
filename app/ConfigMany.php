<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ConfigMany extends Eloquent
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
}

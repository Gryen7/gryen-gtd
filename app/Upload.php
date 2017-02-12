<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $fillable = [
        'table',
        'id_in_table',
        'url',
        'status'
    ];
}

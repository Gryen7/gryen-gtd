<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Word extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'content',
        'status'
    ];

    /**
     * 获取致知
     * @return object
     */
    public static function getWord()
    {
        $words = Word::orderBy('created_at', 'desc')->first();

        if (empty($words)) {
            $words = (object)[
                'content' => ''
            ];
        }

        return $words;
    }
}

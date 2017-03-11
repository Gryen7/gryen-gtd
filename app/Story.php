<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Story extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'resource',
        'images',
        'content',
        'status'
    ];

    /**
     * 获取故事
     * @return object
     */
    public static function getStory()
    {
        $stories = Story::orderBy('created_at', 'desc')->first();

        if (empty($stories)) {
            $stories = (object)[
                'title' => '',
                'content' => '',
                'images' => '',
                'resource' => ''
            ];
        }

        return $stories;
    }
}

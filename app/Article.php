<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Article
 *
 * @property-read \App\ArticleData $withContent
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $tags
 * @property string $cover
 * @property bool $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereCover($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereTags($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereUpdatedAt($value)
 */
class Article extends Eloquent
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'tags',
        'cover',
        'status',
        'created_at',
        'updated_at'
    ];

    protected $dates = ['deleted_at'];

    /**
     * 文章内容
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function withContent()
    {
        return $this->hasOne('App\ArticleData');
    }

    /**
     * 文章描述处理
     * @param $articleContent
     * @return string
     */
    public static function descriptionProcess($articleContent)
    {
        return mb_substr(strip_tags($articleContent), 0, 140);
    }

    /**
     * 从数据库获取文章，标签处理
     * @param $article
     * @return bool
     */
    public static function getTagArray(&$article)
    {
        if (empty($article)) {
            return false;
        }

        if (isset($article->id)) {
            $article->tagArray = explode(',', $article->tags);
        } else {
            foreach ($article as &$value) {
                $value->tags = explode(',', $value->tags);
            }
        }

        return $article;
    }

    /**
     * 首页摄影板块
     * @param int $column 默认 3 列
     * @return mixed
     */
    public static function getPhotosForHome($column = 3)
    {
        $photos = self::where('status', '>', 0)
            ->where('tags', 'like', '%摄影%')
            ->where('cover', '<>', '')
            ->skip(0)
            ->take(12)
            ->get();

        $photosNum = $photos->count();

        if ($photosNum % $column !== 0) {
            $photos = $photos->splice(0, intval($photosNum / $column) * $column);
        }

        return $photos;
    }

    /**
     * 首页随笔板块
     * @param int $column 默认 4 列
     * @return mixed
     */
    public static function getNotesForHome($column = 4)
    {
        $notes = self::where('status', '>', 0)
            ->where('tags', 'like', '%随笔%')
            ->where('cover', '<>', '')
            ->skip(0)
            ->take(8)
            ->get();

        $notesNum = $notes->count();

        if ($notesNum % $column !== 0) {
            $notes = $notes->splice(0, intval($notesNum / $column) * $column);
        }

        return $notes;
    }

}

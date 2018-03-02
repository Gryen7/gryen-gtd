<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Tag
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property int $num
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Tag whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Tag whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Tag whereNum($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Tag whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Article[] $article
 */
class Tag extends Model
{
    protected $fillable = [
        'name'
    ];


    /**
     * 与文章多对多关联
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function article()
    {
        return $this->belongsToMany('App\Article', 'tag_maps', 'tag_id', 'article_id');
    }

    /**
     * 新建文章标签处理
     * @param $tagString
     * @param $articleId
     */
    public static function createArticleTagProcess($tagString, $articleId)
    {
        $tagArray = array_filter(explode(',', $tagString));

        foreach ($tagArray as $tag) {
            $tagInDatabase = Tag::where('name', $tag)->first();

            if (empty($tagInDatabase)) {
                // 标签不存在，创建标签
                $tagInDatabase = Tag::create(['name' => $tag]);
            }

            $tagMapInDatabase = TagMap::where('article_id', $articleId)
                ->where('tag_id', $tagInDatabase->id)->first();

            if (empty($tagMapInDatabase)) {
                // 关系不存在，创建关系
                TagMap::create(['article_id' => $articleId, 'tag_id' => $tagInDatabase->id]);

                // 标签已经存在，更新引用标签次数
                $tagInDatabase->increment('num');
            }
        }

    }
}

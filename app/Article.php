<?php

namespace App;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Article extends Eloquent implements Feedable
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'tags',
        'cover',
        'status',
        'created_at',
        'updated_at',
        'published_at',
        'modified_times',
    ];

    protected $dates = ['deleted_at', 'published_at'];

    /**
     * 文章内容.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function withContent()
    {
        return $this->hasOne('App\ArticleData');
    }

    /**
     * 从数据库获取文章，标签处理.
     * @param $article
     * @return object
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

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create([
            'id' => $this->id,
            'title' => $this->title,
            'summary' => $this->description,
            'updated' => $this->updated_at,
            'link' => action('ArticlesController@show', ['id' => $this->id]),
            'author' => env('APP_NAME'),
        ]);
    }

    public static function getFeedItems()
    {
        return self::where('status', '>', '0')->get();
    }

    public static function analytics()
    {
        $articlesPublishedAts = Article::all(['published_at'])->filter(function ($article) {
            return ! empty($article->published_at);
        });
        $count = $articlesPublishedAts->count();

        if ($count > 0) {
            $maxDate = $articlesPublishedAts->max()->published_at;
            $minDate = $articlesPublishedAts->min()->published_at;
            $distance = $maxDate->diffInDays($minDate);
            $aveRage = ceil($distance / $count);
            $aveDistArr = $articlesPublishedAts->map(function ($value, $key) use ($articlesPublishedAts) {
                if (isset($articlesPublishedAts[$key + 1])) {
                    $curArtClCtdDt = $value->published_at;
                    $nextArticleCtdDt = $articlesPublishedAts[$key + 1]->published_at;

                    return $nextArticleCtdDt->diffInDays($curArtClCtdDt);
                } else {
                    return 0;
                }
            });

            $aveDist = ceil(array_sum($aveDistArr->toArray()) / count($aveDistArr));
        } else {
            $maxDate = null;
            $aveRage = null;
            $aveDist = null;
        }

        $maxDateCal = empty($maxDate) ? null : $maxDate->calendar();
        $disNow = empty($maxDate) ? null : CarbonImmutable::now()->diffInDays($maxDate);
        $viewsSum = Article::sum('views');

        return compact('aveRage', 'aveDist', 'maxDateCal', 'disNow', 'viewsSum');
    }
}

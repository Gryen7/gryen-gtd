<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\Http\Controllers\Controller;
use Carbon\CarbonImmutable;

class DashboardController extends Controller
{
    /**
     * 计算平均发博天数及平均间隔天数.
     * @return array
     */
    public function analytics()
    {
        $articlesPublishedAts = Article::all(['published_at']);
        $count = $articlesPublishedAts->count();
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
        $maxDateCal = $maxDate->calendar();
        $disNow = CarbonImmutable::now()->diffInDays($maxDate);

        return compact('aveRage', 'aveDist', 'maxDateCal', 'disNow');
    }
}

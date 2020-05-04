<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * 计算平均发博天数及平均间隔天数
     * @return array
     */
    public function analytics()
    {
        $articlesCreatedAts = Article::all(['created_at']);
        $count = $articlesCreatedAts->count();
        $maxDate = $articlesCreatedAts->max()->created_at;
        $minDate = $articlesCreatedAts->min()->created_at;

        $distance = $maxDate->diffInDays($minDate);
        $aveRage = round($distance / $count, 2);

        $aveDistArr = $articlesCreatedAts->map(function ($value, $key) use ($articlesCreatedAts) {
            if (isset($articlesCreatedAts[$key + 1])) {
                $curArtClCtdDt = $value->created_at;
                $nextArticleCtdDt = $articlesCreatedAts[$key + 1]->created_at;

                return $nextArticleCtdDt->diffInDays($curArtClCtdDt);
            } else {
                return 0;
            }
        });

        $aveDist = round(array_sum($aveDistArr->toArray()) / count($aveDistArr), 2);

        return compact('aveRage', 'aveDist');
    }
}

<?php

namespace App\Http\Controllers;

use App\Banner;
use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = 'home';
        $banner = Banner::orderByDesc('weight')->first();

        if ($banner) {
            $banner->link = action('ArticlesController@show', ['id' => $banner->article_id]);
            $banner->description = $banner->article->description;
            $banner->title = $banner->article->title;
        }

        return view('home.index', compact('module', 'banner', 'siteTitle'));
    }

    public function sitemap()
    {
        return Sitemap::create()
            ->add(\Spatie\Sitemap\Tags\Url::create('/home')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(\Spatie\Sitemap\Tags\Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.1))
            ->render();
    }
}

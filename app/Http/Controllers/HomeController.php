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
        $banners = Banner::orderByDesc('weight')->get();

        return view('home.index', compact('module', 'banners'));
    }

    public function privacyPolicy()
    {
        $module = 'home';

        return view('home.privacy-policy', compact('module'));
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

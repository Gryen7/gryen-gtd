<?php

namespace App\Http\Controllers;

use App\Banner;

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
}

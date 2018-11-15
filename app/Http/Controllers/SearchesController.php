<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchesController extends Controller
{
    public function search(Request $request)
    {
        return view('searches.search', compact('keywords', 'request'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchesController extends Controller
{
    public function search(Request $request)
    {
        return view('searches.search', compact('keywords', 'request'));
    }
}

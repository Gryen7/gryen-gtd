<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ToDosController extends Controller
{
    public function create()
    {
        return view('todos.create');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Todo;

class TodosController extends Controller
{
    public function getList()
    {
        $todos = Todo::all();
        return response()->json($todos);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Todo;

class TodosController extends Controller
{
    public function getList($page = 1)
    {
        $todos = Todo::getTodoListForControlPannel($page);
        return response()->json($todos);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTodoRequest;
use App\Todo;

class ToDosController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * @param CreateTodoRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateTodoRequest $request)
    {
        Todo::create($request->all());
        return redirect('control/todolist');
    }
}

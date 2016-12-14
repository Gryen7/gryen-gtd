<?php

namespace App\Http\Controllers\Control;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTodoRequest;
use Illuminate\Http\Request;
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

    /**
     * delete onetodo
     * @param $ids
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($ids)
    {
        Todo::destroy($ids);
        return response()->json(
            [
                'code' => 200,
                'msg' => 'success'
            ]
        );
    }

    /**
     * change onetodo status
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus(Request $request)
    {
        $todo = Todo::find($request->id);
        $todo->status = $request->status;
        $result = $todo->save();

        return response()->json(
            [
                'code' => $todo->status == 2 ? 201 : 200,
                'msg' => $result
            ]
        );
    }
}

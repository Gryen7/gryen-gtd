<?php

namespace App\Http\Controllers\Control;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTodoRequest;
use Illuminate\Http\Request;
use App\Todo;

class ToDosController extends Controller
{

    /**
     * todolist view
     * @param $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($page = 1)
    {
        return view('control.todolist', Todo::getTodoListForControlPannel($page));
    }
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
        $todo = Todo::create($request->all());

        $description = $request->get('description');

        if (!empty($description)) {
            $todo->withDescription()->create([
                'content' => $description
            ]);
        }

        return redirect('control/todos');
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
                'msg' => '任务标记完成'
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeDate(Request $request)
    {
        $todo = Todo::find($request->id);
        if ($request->begin_at) {
            $todo->begin_at = $request->begin_at;
        }
        if ($request->end_at) {
            $todo->end_at = $request->end_at;
        }
        $result = $todo->save();

        return response()->json(
            [
                'code' => 200,
                'msg' => $result
            ]
        );
    }
}

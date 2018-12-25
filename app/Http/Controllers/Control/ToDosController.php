<?php

namespace App\Http\Controllers\Control;

use App\Events\Operation;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTodoRequest;
use Carbon\Carbon;
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
        $request->merge([
            'parents_id' => 0,
            'grandparents_id' => 0,
            'status' => 1
        ]);

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

        $break = false;

        $response = [
            'code' => 200,
            'type' => 'success',
            'msg' => '修改成功'
        ];

        $request->begin_at = Carbon::createFromFormat('Y-m-d', $request->begin_at)->toDateString();
        $request->end_at = Carbon::createFromFormat('Y-m-d', $request->end_at)->toDateString();

        if ($request->end_at < Carbon::now()) {
            $break = true;
            $response = [
                'code' => 400,
                'type' => 'warning',
                'msg' => '结束时间小于当前时间'
            ];
        }

        if (!$break && $request->end_at < $request->begin_at) {
            $break = true;
            $response = [
                'code' => 400,
                'type' => 'warning',
                'msg' => '结束时间小于开始时间'
            ];
        }

        $todo = Todo::find($request->id);

        if (!$break && !$todo->update($request->all())) {
            $response = [
                'code' => 500,
                'type' => 'danger',
                'msg' => '保存失败'
            ];
        }

        event(new Operation($response));

        return response()->json($response);
    }

}

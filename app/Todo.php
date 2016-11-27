<?php
/**
 * Created by PhpStorm.
 * User: targaryen
 * Date: 2016/11/18
 * Time: 下午10:59
 */
namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Eloquent
{
    use SoftDeletes;

    protected $fillable = [
        'parents_id',
        'grandparents_id',
        'importance',
        'content',
        'status',
        'begin_at',
        'end_at',
    ];

    protected $dates = ['deleted_at'];

    /**
     * get todolist for control pannel
     * @param $page
     * @return array
     */
    public static function getTodoListForControlPannel ($page) {
        $take = 10;
        $skip = ($page -1 ) * $take;
        $todos = Todo::skip($skip)
            ->take($take)
            ->get();
        foreach ($todos as &$todo) {
            $todo->begin_at = Carbon::parse($todo->begin_at)->format('Y-m-d');
            $todo->end_at = Carbon::parse($todo->end_at)->format('Y-m-d');

            switch ($todo->importance) {
                case 1:
                    $todo->importanceStyle = 'primary';
                    break;
                case 2:
                    $todo->importanceStyle = 'warning';
                    break;
                case 3:
                    $todo->importanceStyle = 'danger';
                    break;
                default:
                    $todo->importanceStyle = 'info';
                    break;
            }
        }
        $pageCount = ceil(Todo::all()->count() / $take);
        $prev = $page - 1 > 0 ? $page - 1 : 0;
        $next = $page + 1 <= $pageCount ? $page + 1 : $pageCount;

        return compact('todos', 'prev', 'next', 'pageCount');
    }
}
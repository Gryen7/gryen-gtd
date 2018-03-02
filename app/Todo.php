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

/**
 * App\Todo
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $parents_id
 * @property int $grandparents_id
 * @property string $content
 * @property bool $status
 * @property bool $importance
 * @property string $begin_at
 * @property string $end_at
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Todo whereBeginAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo whereEndAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo whereGrandparentsId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo whereImportance($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo whereParentsId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Todo whereUpdatedAt($value)
 * @property-read \App\TodoDescription $withDescription
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Todo onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Todo withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Todo withoutTrashed()
 */
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
            $description = $todo->withDescription()->first();
            $todo->description = $description ? $description->content : null;

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function withDescription()
    {
        return $this->hasOne('App\TodoDescription');
    }
}
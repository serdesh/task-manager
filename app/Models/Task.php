<?php

namespace App\Models;

use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasOne;

/**
 * Class Task
 * @package App\Models
 *
 * @property string $description Описание задачи
 * @property string $deadline Срок
 * @property int $status Статус
 * @property int $project_id Проект
 * @property string $note Примечание
 *
 * @property \App\Models\Project $project Проект задачи
 */
class Task extends Model
{
    use HasFactory;

    const STATUS_ON_WORK = 1;
    const STATUS_FINISHED = 2;

    public $timestamps = true;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'task';

    /**
     * Получаем все актуальные задачи
     * @return array
     */
    public static function getActualTasks(): array
    {
        $tasks = self::where(['status' => Task::STATUS_ON_WORK])->get();

        $result = [];
        /** @var \App\Models\Task $task */
        foreach ($tasks as $task){
            $project = $task->project;
            Debugbar::info($project->name ?? 'Проект не найден');
            $result[] = [
                'description' => $task->description,
                'deadline' => $task->deadline,
                'status' => $task->status,
                'project' => $project ? "<a href='{$project->url}'>{$project->name}</a>" : '' ,
                'note' => $task->note,
            ];
        }

        return $result;

    }

    /**
     * Проект для задачи
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function getProject(): hasOne
    {
        return $this->hasOne('Project');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Project
 * @package App\Models
 *
 * @property string $name Наименование
 * @property string $url Адрес
 * @property int $customer_id Заказчик
 *
 * @property \App\Models\Project $tasks Задачи для проекта
 */
class Project extends Model
{
    use HasFactory;

    public $timestamps = true;

    /**
     * Задачи по проекту
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getTasks(): HasMany
    {
        return $this->hasMany('Task');
    }
}

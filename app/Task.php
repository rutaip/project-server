<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'parent_task',
        'task_owner',
        'completed',
        'project_id',
        'start_date',
        'finish_date'
    ];

    public function resource()
    {
        return $this->hasOne(Resource::class, 'id', 'task_owner');
    }
}



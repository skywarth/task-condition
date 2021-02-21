<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $casts = [
        'wildcard_info' => 'json',

    ];

    protected $fillable = [
        'title',
        'task_type_id',
        'wildcard_info',
        /*'prerequisites',*/
    ];

/*    public function scopeConditionTitles($query)
    { //no need for scope, won't work this way
        return $query->title;
        //return $query->ConditionTasks->pluck("title")->all();
    }*/

    public function ConditionTitles()
    {

        return $this->ConditionTasks->pluck("title")->all();
    }

    public function ConditionTitlesString()
    {

        return implode(",",$this->ConditionTitles());
    }

    public function TaskType(){

        return $this->belongsTo(TaskType::class);
    }

    public function ConditionTasks()
    {
        return $this->belongsToMany(Task::class,'task_condition','origin_task_id','condition_task_id');
        //return $this->belongsToMany('App\Model\Task','task_condition','origin_task_id','condition_task_id');
    }
}

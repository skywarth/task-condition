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



    public function ConditionTasks()
    {
        return $this->belongsToMany(Task::class,'task_condition','origin_task_id','condition_task_id');
        //return $this->belongsToMany('App\Model\Task','task_condition','origin_task_id','condition_task_id');
    }
}

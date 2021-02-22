<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Task;
use App\Models\TaskType;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Task::all()->sortByDesc(function($x)
        {
            return $x->recursiveConditionTasks->count();
        });;

       return view("forwardie/task/index")->with("data",$data);
    }
    public function test(){
       //dd( $this->listAllEagerLoad());
        //dd(Task::with('ConditionTasks')->get()->reverse()->first()->ConditionTasks->all()[0]->title);

        //dd(implode(',',Task::find(2)->ConditionTitles() ));
        /*$a=Task::find(2)->wildcard_info;
        foreach ($a as $info){
            return $info;
        }*/



        /*$data=Task::find(8)->allConditionTasks;
        foreach ($data as $d){
            foreach ($d as $x){

            }
        }
        function a(){

        }*/
       // $data=Task::find(8)->recursiveConditionTasks;

       /* $recursive=$data->pluck("id")->all();
        $hasRoot=in_array(7,$recursive);
        dd($hasRoot);*/
        $data=Task::with('recursiveConditionTasks')->get()->sortByDesc(function($x)
        {
            return $x->recursiveConditionTasks->count();
        });

        //dd(Task::find(8)->recursiveConditionTasks->count());
        dd($data);
    }

    public function listAll(){
        return Task::all();


    }

    public function listAllEagerLoad(){
        $data=Task::with('ConditionTasks','TaskType')->get();
        return $data;


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $taskTypes=TaskType::all()->sortByDesc("id");
        $currencies=Currency::all();
        return view("forwardie/task/create",["taskTypes"=>$taskTypes,"currencies"=>$currencies]);
    }

    public function addConditionView($TaskId)
    {

        $tasks=Task::all(); //no need for pagination nor lazy load. Can do em in actual projects
        $relatedTask=$tasks->find($TaskId);
        if($relatedTask==null){
            abort(400,"Not an actual task");
        }
        return view("forwardie/task/add-condition",["tasks"=>$tasks,"relatedTask"=>$relatedTask]);
    }


    public function addCondition(Request $request)
    {


        $originTask=Task::find($request->origin);
        $conditionTask=Task::find($request->conditionTask);
        //check algo
        $result= $this->checkParadox($originTask,$conditionTask);
        if($result){
            abort(403,"This condition creates paradox");
        }

        $originTask->ConditionTasks()->attach($conditionTask);
        return response()
            ->json(true);
    }

    public function checkParadox(Task $origin, Task $condition){

        $originId=$origin->id;
        $originConditions=$origin->ConditionTasks;


        if($origin->id==$condition->id){
            return true;
        }
        $recursive=$condition->recursiveConditionTasks;
        $relationArray=$recursive->pluck("id")->all();

        $hasRoot=in_array($originId,$relationArray);
        /*$recursive=$origin->recursiveConditionTasks;
        $hasRoot = $recursive->contains(function ($data, $key) {
            return $data->id == 8;
        });*/
        return $hasRoot;

    }





/*     * @param  \Illuminate\Http\Request  $request*/
    /**
     * Store a newly created resource in storage.
     *

     * @param  Task  $request
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //have to do some different methods in order to apply both main and additional data
try{
    $additionalData=array();
    parse_str($request->additional, $additionalData);




    parse_str($request->mainData, $mainData);

    $newTask= new Task();
    $newTask->title=$mainData["title"];
    $newTask->TaskType()->associate($mainData["task_type_id"]);


    $newTask->wildcard_info=$additionalData;

    $newTask->save();

    return response()
        ->json(true);
}
catch (\Exception $ex){
    return response()
        ->json($ex);
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

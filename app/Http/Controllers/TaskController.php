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
        $data=$this->listAll();

       return view("forwardie/task/index")->with("data",$data);
    }
    public function test(){
       //dd( $this->listAllEagerLoad());
        //dd(Task::with('ConditionTasks')->get()->reverse()->first()->ConditionTasks->all()[0]->title);

        //dd(implode(',',Task::find(2)->ConditionTitles() ));
        $a=Task::find(2)->wildcard_info;
        foreach ($a as $info){
            return $info;
        }
        dd();
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
        $taskTypes=TaskType::all();
        $currencies=Currency::all();
        return view("forwardie/task/create",["taskTypes"=>$taskTypes,"currencies"=>$currencies]);
    }


/*     * @param  \Illuminate\Http\Request  $request*/
    /**
     * Store a newly created resource in storage.
     *

     * @param  Task  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Task $request)
    {
        return response()
            ->json(true);
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

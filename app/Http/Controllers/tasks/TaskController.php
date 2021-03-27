<?php

namespace App\Http\Controllers\tasks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;

use  App\Http\Requests\tasks;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks =  Task::selection()->get();
        return view('tasks.index',compact('tasks'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
    {   $projects =  Project::all();
        $tasks =  Task::all();
        return view('tasks.create',compact('projects','tasks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(tasks $request)
    {
        try {
             
            Task::create($request->except(['_token'])) ;
             return redirect()->route('tasks.index')->with(['success'=>'task added successfully']);
           } catch(\Exception $ex)
             {
            return redirect()->route('tasks.index')->with(['error'=>'there is error here']);

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
        $task = Task::find($id);
        $projects =  Project::all();
        if(!$task){
            return redirect()->route('tasks.index')->with(['error'=>'task not found']);

        }
        return view('tasks.edit',compact('task','projects'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(tasks $request, $id)
    {
        try{
            $task = Task::find($id);
            if (!$task) {
                return redirect()->route('tasks.index')->with(['error'=>'task not found']);
            }
            $task->update($request->except('_token'));

            return redirect()->route('tasks.index')->with(['success'=>'task added successfully']);
           } catch(\Exception $ex)
             {
            return redirect()->route('tasks.index')->with(['error'=>'there is error here']);
              }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $task = task::find($id);
            if (!$task) {
                return redirect()->route('tasks.index')->with(['error'=>'task not found']);
            }
            $task->delete();

            return redirect()->route('tasks.index')->with(['success'=>'task deleted successfully']);
        } catch(\Exception $ex)
          {
              //return $ex;
         return redirect()->route('tasks.index')->with(['error'=>'there is error here']);
           }

    }
    
    public function changeStatus($id)
    {
        
         $task =  Task::find($id);
         $task->update(['status' =>'finish']);
         
        
         return redirect()->back();


       
          
}
}
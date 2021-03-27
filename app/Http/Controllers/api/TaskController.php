<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\api\ApiResponseTrait;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use ApiResponseTrait;

    public function index()
    {
        $task = Task::With('project:id,name')->get();
        return $this->ApiResponse($task,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all() ,
        [
            'name'=>'required|max:191|string',
            'status'=>'required',
            'project_id' => 'required|exists:projects,id',
        ]);
       
       
    if($validator->fails())
    {
        return $validator->errors();
    }
    $task= Task::create($request->all());

  if($task)
  {
         return $this->ApiResponse($task,201);
  }

  return $this->notfound();

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
        $validator = Validator::make($request->all() ,
        [
          
            'name'=>'required|max:191|string',
            'status'=>'required',
            'project_id' => 'required|exists:projects,id'
        ]);
       

    if($validator->fails())
    {
        return $validator->errors();
    }


        $task=Task::findOrFail($id);
        $task->update($request->all());
        if($task)
        {
            return $this->ApiResponse($task,201);
        }
       else
        {
             return $this->notfound();
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
        $task=Task::find($id);
        if($task){
            $task->delete();
             return response()->json(['Message'=>'deleted successfully']);
        }

      return $this->ApiResponse(null , 'sorry we not found it' ,404);
    }
    
    }


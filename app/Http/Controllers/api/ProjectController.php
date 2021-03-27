<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\api\ApiResponseTrait;
use App\Models\Project;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use ApiResponseTrait;

    public function index()
    {
        $project = Project::Selection()->get();
        return $this->ApiResponse($project,200);
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
                'creator'=>'required|string',
                'start_at' => 'date|required',
                'end_at' => 'date|required'
            ]);
           

        if($validator->fails())
        {
            return $validator->errors();
        }
        $project= Project::create($request->all());

      if($project)
      {
             return $this->ApiResponse($project,201);
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
            'creator'=>'required|string',
            'start_at' => 'date|required',
            'end_at' => 'date|required'
        ]);
       

    if($validator->fails())
    {
        return $validator->errors();
    }


        $project=Project::findOrFail($id);
        $project->update($request->all());
        if($project)
        {
            return $this->ApiResponse($project,201);
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
        $project=Project::find($id);
        if($project){
            $project->delete();
             return response()->json(['Message'=>'deleted successfully']);
        }

      return $this->ApiResponse(null , 'sorry we not found it' ,404);
    }
}

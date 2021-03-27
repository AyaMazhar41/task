<?php

namespace App\Http\Controllers\projects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use  App\Http\Requests\projects;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects =  Project::all();
        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(projects $request)
    {
        try {
             
            Project::create($request->except(['_token'])) ;
             return redirect()->route('projects.index')->with(['success'=>'project added successfully']);
           } catch(\Exception $ex)
             {
            return redirect()->route('projects.index')->with(['error'=>'there is error here']);

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
        $project = Project::find($id);
        if(!$project){
            return redirect()->route('projects.index')->with(['error'=>'project not found']);

        }
        return view('projects.edit',compact('project'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,projects $request)
    {
        try{
            $project = Project::find($id);
            if (!$project) {
                return redirect()->route('projects.index')->with(['error'=>'project not found']);
            }
            $project->update($request->except('_token'));

            return redirect()->route('projects.index')->with(['success'=>'project added successfully']);
           } catch(\Exception $ex)
             {
            return redirect()->route('projects.index')->with(['error'=>'there is error here']);
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
            $project = Project::find($id);
            if (!$project) {
                return redirect()->route('projects.index')->with(['error'=>'project not found']);
            }
            $project->delete();

            return redirect()->route('projects.index')->with(['success'=>'project deleted successfully']);
        } catch(\Exception $ex)
          {
         return redirect()->route('projects.index')->with(['error'=>'there is error here']);
           }

    }
}

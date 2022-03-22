<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function index()
    {
        return Project::all();
    }

    public function store(Request $request)
    {

        $project = new Project();
        $project->title = $request->title;
        $project->stack = $request->stack;
        $project->demo = $request->demo;
        $project->cover = $request->cover;
        $project->save();
        return $project;
    }
    public function update(Project $project, Request $request)
    {

        if ($request->has('title') && $request->filled('title')) {
            $project->title = $request->title;
        }
        if ($request->has('stack') && $request->filled('stack')) {
            $project->stack = $request->stack;
        }
        if ($request->has('demo') && $request->filled('demo')) {
            $project->demo = $request->demo;
        }
        if ($request->has('cover') && $request->filled('cover')) {
            $project->cover = $request->cover;
        }


        $project->save();
        return $project;
    }

    
    public function destroy(Project $project)
    {
        $project->delete();
        return response('ok');
    }
}

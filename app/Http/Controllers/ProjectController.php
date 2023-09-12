<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class ProjectController extends Controller
{
    public function index(){
        
        $projects = Project::orderBy('Total', 'desc')->take(3)->get();

        return view('welcome', compact('projects'));
    }

    public function projectList(){
        
        $projects = Project::all();

        return view('projects.list', compact('projects'));
    }

    public function create(){

        return view('projects.create');
    }

    public function show($id){

        $project = Project::findOrFail($id);
        $tasks = Task::where('project', $id)->orderBy('Total', 'desc')->get();
 // Recupere as tarefas relacionadas a este projeto

        return view ('projects.show', compact('project', 'tasks'));
    }

    public function store(Request $request){

        $project = new Project;

        $project->projectName = $request->projectName;
        $project->projectDescription = $request->projectDescription;
        $project->G = $request->g;
        $project->U = $request->u;
        $project->T = $request->t;
        $project->Total = $request->g + $request->u + $request->t;

        $project->save();

        return redirect('/');

    }
}

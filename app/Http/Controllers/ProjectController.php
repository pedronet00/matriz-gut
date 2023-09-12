<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class ProjectController extends Controller
{
    public function index(){

        $user = auth()->user();
        
        $projects = $user->projects()
        ->orderBy('Total', 'desc')
        ->take(3)
        ->get();

        return view('dashboard', compact('projects'));
    }

    public function projectList(){

        $user = auth()->user();

        $projects = $user->projects;

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
    
        // Associar o usuário atual ao projeto e salvar na tabela project_user
        auth()->user()->projects()->attach($project->id);
    
        return redirect('/');

    }
}

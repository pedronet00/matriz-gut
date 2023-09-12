<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
   

    public function store(Request $request, $projectId)
    {
        $task = new Task;

        $task->taskName = $request->taskName;
        $task->G = $request->g;
        $task->U = $request->u;
        $task->T = $request->t;
        $task->project = $projectId;

        $total = $request->g + $request->u + $request->t;

        $task->Total = $total;

        $task->save();

        return redirect('/project/{{id}}');
    }

    public function taskEnded($taskId){

        $task = Task::find($taskId);

        if ($task) {
            $task->status = 1;
            $date = date('Y-m-d H:i:s');
            $task->endDate = $date;
            $task->save();
            // Redirecione de volta para a página anterior ou para onde desejar.
            return redirect()->back()->with('success', 'Tarefa marcada como finalizada com sucesso.');
        } else {
            // Trate o caso em que a tarefa não foi encontrada.
            return redirect()->back()->with('error', 'Tarefa não encontrada.');
        }
    }
}

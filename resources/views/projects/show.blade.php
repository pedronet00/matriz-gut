@extends('layouts.main')


@section('content')

<x-app-layout>

<h1 style="text-align: center; font-size: 50px; margin-top: 5%;">{{$project->projectName}}</h1>

<h2 style="text-align: center; margin-top: 2%;">Cadastre uma nova task:</h2>

<form class="row g-3" style="width: 50%; margin: 2% auto;" method="POST" action="/project/{{$project->id}}/task">
  @csrf
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Tarefa</label>
    <input type="text" class="form-control" id="inputEmail4" name="taskName">
  </div>
  <div class="col-md-4">
    <label for="inputEmail4" class="form-label">Gravidade (G)</label>
    <input type="number" class="form-control" id="inputEmail4" value="0" max="5" min="0" name="g">
  </div>
  <div class="col-md-4">
    <label for="inputEmail4" class="form-label">Urgência (U)</label>
    <input type="number" class="form-control" id="inputEmail4" value="0" max="5" min="0" name="u">
  </div>
  <div class="col-md-4">
    <label for="inputEmail4" class="form-label">Tendência (T)</label>
    <input type="number" class="form-control" id="inputEmail4" value="0" max="5" min="0" name="t">
  </div>
  
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </div>
</form>




    <table class="table" style="width: 70%; margin: auto; text-align:center;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tarefa</th>
      <th scope="col">GRAVIDADE</th>
      <th scope="col">URGÊNCIA</th>
      <th scope="col">TENDÊNCIA</th>
      <th scope="col">Total</th>
      <th scope="col">Ação</th>

    </tr>
  </thead>

  <tbody>
  <?php $i = 1;?>
  @foreach($tasks as $task)
    @if($task->status == 0)
  
      <tr>
        <th scope="row"><?php echo $i;?></th>
        <td>{{$task->taskName}}</td>
        <td>{{$task->G}}</td>
        <td>{{$task->U}}</td>
        <td>{{$task->T}}</td>
        <td>{{$task->Total}}</td>
        <td><a href="/project/{{$task->id}}/task/ended"><i class="fa-solid fa-check" style="color: #2b972c;"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/project/{{$task->id}}/task/deleted"><i class="fa-solid fa-trash" style="color: #f52314;"></i></a></td>
      </tr>
      <?php $i = $i+1;?>
    @endif
  @endforeach
  </tbody>
</table>

</x-app-layout>

@endsection
@extends('layouts.main')

@section('title', 'Projetos | Listar')

@section('content')
<h1 style="text-align: center; width: 100%; font-size: 50px; margin-top: 2%;">Listando Projetos</h1>






<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3" style="width: 100%; margin: auto;">
@foreach($projects as $project)
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{$project->projectName}}</h5>
        <p class="card-text" style="color: grey;">{{$project->projectDescription}}</p>
        <a href="/project/{{$project->id}}" style="text-decoration: none; color: black; font-weight: bold;">Ver detalhes</a>
      </div>
    </div>
  </div>
  
@endforeach
</div>

@if(count($projects) == 0)
    <p>Não há projetos cadastrados!</p>
@endif
@endsection
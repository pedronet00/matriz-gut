@extends('layouts.main')

@section('title', 'Projetos | Listar')

@section('content')



<x-app-layout>


@if(count($projects) > 0)
  <h1 style="text-align: center; width: 100%; font-size: 50px; margin-top: 2%;">Listando Projetos</h1>
@endif

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
    <div class="msg-sem-projetos" style="margin: auto; text-align: center; margin-top: 15%;">
        <h3 style="font-size: 32px;">Você ainda não cadastrou um projeto :(</h3>
        <br/>
        <p style="color: grey;">Não perca mais tempo e desfrute da agilidade de gerenciamento de seus projetos.</p>
        <br/><br/>
        <a href="/project/create" class="cadastrar-agora" style="background-color: darkgrey; color: white; padding: 1%;  border-radius: 10px; font-size: 22px;">Cadastrar agora</a>
    </div>
@endif
</x-app-layout>
@endsection
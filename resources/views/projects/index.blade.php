@extends('layouts.app')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center">
    <h1>Progetti</h1>

    <a href="{{ route('projects.create') }}" class="btn btn-primary">Nuovo Progetto</a>
  </div>
</div>

<div class="container">
  <table class="table table-warning table-striped">
    <thead class="text-center">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Slug</th>
        <th scope="col">Descrizione</th>
        <th scope="col">Cliente</th>
        <th scope="col">URL</th>
      </tr>
    </thead>

    <tbody>
      @forelse ($projects as $project)
      <tr>
        <td>{{$project->id}}</td>
        <td>{{$project->name}}</td>
        <td>{{$project->slug}}</td>
        <td>{{$project->description}}</td>
        <td>{{$project->client}}</td>
        <td>{{$project->url}}</td>
      </tr>

      @empty
      <tr>
        <td colspan="6">Nessun Progetto Trovato</td>
      </tr>
      @endforelse
    </tbody>
  </table>

</div>
@endsection
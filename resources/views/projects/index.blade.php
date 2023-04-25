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
        <th scope="col">Eliminato</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>

    <tbody>
      @forelse ($projects as $project)
      <tr>
        <td>{{$project->id}}</td>
        <td>
          <a href="{{ route('projects.show', $project) }}">{{$project->name}}</a>
        </td>
        <td>{{$project->slug}}</td>
        <td>{{$project->description}}</td>
        <td>{{$project->client}}</td>
        <td>{{$project->url}}</td>
        <!-- Operatore Ternario: Se il Progetto e' stato eliminato stampo la Data di Eliminazione, altimenti nulla -->
        <td>{{ $project->trashed() ? $project->deleted_at : '' }}</td>
        <td>
          <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">Modifica</a>

          <form class="my-2" action="{{ route('projects.destroy', $project) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina</button>
          </form>

          @if ($project->trashed())
          <form action="{{ route('projects.restore', $project) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-success">Ripristina</button>
          </form>
          @endif
        </td>
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
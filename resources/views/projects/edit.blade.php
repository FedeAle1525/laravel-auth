@extends('layouts.app')

@section('content')

<div class="container text-center py-4">
  <h1>Modifica Progetto</h1>
</div>

<div class="container">
  <form action="{{ route('projects.update', $project) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Nome</label>
      <div class="input-group">
        <input type="text" class="form-control" name="name" value="{{ $project->name }}" </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Descrizione</label>
        <div class="input-group">
          <textarea class="form-control" name="description" rows="6">
          {{ $project->description }}
          </textarea>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Cliente</label>
        <div class="input-group">
          <input type="text" class="form-control" name="client" value="{{ $project->client }}">
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">URL</label>
        <div class="input-group">
          <input type="text" class="form-control" name="url" value="{{ $project->url }}">
        </div>
      </div>

      <button type="submit" class="btn btn-warning">Salva</button>
  </form>
</div>

@endsection
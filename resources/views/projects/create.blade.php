@extends('layouts.app')

@section('content')

<div class="container text-center py-4">
  <h1>Crea un Nuovo Progetto</h1>
</div>

<div class="container">
  <form action="{{ route('projects.store') }}" method="post">
    @csrf

    <div class="mb-3">
      <label class="form-label">Nome</label>
      <div class="input-group">
        <input type="text" class="form-control" name="title">
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Descrizione</label>
      <div class="input-group">
        <textarea class="form-control" name="description" rows="6"></textarea>
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Cliente</label>
      <div class="input-group">
        <input type="text" class="form-control" name="client">
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">URL</label>
      <div class="input-group">
        <input type="text" class="form-control" name="url">
      </div>
    </div>

    <input type="submit" class="btn btn-primary" value="Crea">
  </form>
</div>

@endsection
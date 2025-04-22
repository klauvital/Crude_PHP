@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Estado</h1>

    <form action="{{ route('estado.update', $estado->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" class="form-control" value="{{ $estado->nome }}" required>
        </div>

        <div class="form-group">
            <label for="sigla">Sigla:</label>
            <input type="text" name="sigla" class="form-control" value="{{ $estado->sigla }}" required>
        </div>
        <div class="mt-3">
            <button type="submit" class=" btn btn-primary">Salvar</button>
            <a href="{{ route('estado.listar') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
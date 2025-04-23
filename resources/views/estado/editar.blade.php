@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Editar Estado</h3>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('estado.update', $estado->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" class="form-control text-capitalize" value="{{ $estado->nome }}" required>
        </div>

        <div class="form-group">
            <label for="sigla">Sigla:</label>
            <input type="text" name="sigla" class="form-control text-uppercase" value="{{ $estado->sigla }}" required>
        </div>
        <div class="mt-3">
            <button type="submit" class=" btn btn-primary">Salvar</button>
            <a href="{{ route('estado.listar') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
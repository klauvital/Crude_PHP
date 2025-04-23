@extends('layouts.app')

@section('content')
<h3 class="mb-4">Editar Cidade</h3>
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
<form action="{{ route('cidade.atualizar', $cidade->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" class="form-control text-capitalize" value="{{ $cidade->nome }}" required>
    </div>


    <div class="form-group">
        <label for="estado_id">Estado:</label>
        <select name="id_estado" class="form-control text-uppercase" required>
            <option value="">Selecione</option>
            @foreach ($estados as $estado)
            <option value="{{ $estado->id }}" {{ (old('id_estado', $cidade->id_estado) == $estado->id) ? 'selected' : '' }}>
                {{ $estado->sigla }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mt-3">
        <button type="submit" class=" btn btn-primary">Salvar</button>
        <a href="{{ route('estado.listar') }}" class="btn btn-secondary">Cancelar</a>
    </div>
</form>
@endsection
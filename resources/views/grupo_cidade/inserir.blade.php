@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Cadastrar Grupo de Cidades</h3>

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

    <form action="{{ route('grupo_cidade.salvar') }}" method="POST">
        @csrf
        <label>Nome do Grupo:</label>
        <input type="text" name="nome_grupo" class="form-control text-capitalize" required>

        <label>Cidades:</label>
        @if ($cidadesDisponiveis->isEmpty())
        <div class="alert alert-info">
            Não há mais cidades disponíveis para serem adicionadas a um grupo.
        </div>
        @else
        <label for="cidades">Selecione as cidades</label>
        <select class="form-select text-capitalize" size=15 name="cidades[]" multiple required>
            @foreach ($cidadesDisponiveis as $cidade)
            <option value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-success mt-3">Salvar</button>
        @endif

        <a href="{{ route('grupo_cidade.listar') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>

@endsection
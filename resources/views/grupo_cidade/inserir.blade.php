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
        <select class="form-select text-capitalize" name="cidades[]" multiple class="form-select" required>
            @foreach ($cidades as $cidade)
            <option value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
            @endforeach
        </select>

        <br>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
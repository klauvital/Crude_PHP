@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Editar Grupo de Cidades</h3>

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

    <form action="{{ route('grupo_cidade.atualizar', $grupo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nome do Grupo:</label>
            <input type="text" name="nome_grupo" value="{{ old('nome_grupo', $grupo->nome_grupo) }}" class="form-control text-capitalize" required>
        </div>
        <div class="form-group">
            <label>Cidades:</label>
            <select name="cidades[]" multiple class="form-select text-capitalize" required>
                @foreach ($cidades as $cidade)
                <option value="{{ $cidade->id }}" {{ in_array($cidade->id, $cidadesSelecionadas) ? 'selected' : '' }}>
                    {{ $cidade->nome }}
                </option>
                @endforeach
            </select>


            <div class="mt-3">
                <button type="submit" class=" btn btn-success">Salvar</button>
                <a href="{{ route('grupo_cidade.listar') }}" class="btn btn-secondary">Cancelar</a>
            </div>
    </form>
</div>
@endsection
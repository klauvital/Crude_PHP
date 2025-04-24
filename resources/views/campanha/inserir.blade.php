@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Inserir Campanha</h3>

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

    <form action="{{ route('campanha.salvar') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nome_campanha" class="form-label">Nome da Campanha</label>
            <input type="text" name="nome_campanha" class="form-control" value="{{ old('nome_campanha') }}" required>
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" name="data" class="form-control" value="{{ old('data') }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Ativa</option>
                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inativa</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_grupo_cidades" class="form-label">Grupo de Cidades</label>
            <select name="id_grupo_cidades" class="form-select" required>
                <option value="">-- Selecione --</option>
                @foreach ($grupo_cidades as $grupo)
                <option value=" {{ $grupo->id }}" {{ old('id_grupo_cidade') == $grupo->id ? 'selected' : '' }}>
                    {{ $grupo->nome_grupo }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Produtos da Campanha</label>
            <div class="form-check">
                @foreach ($produtos as $produto)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="produtos[]" value="{{ $produto->id }}"
                        {{ (is_array(old('produtos')) && in_array($produto->id, old('produtos'))) ? 'checked' : '' }}>
                    <label class="form-check-label">
                        {{ $produto->nome }}
                    </label>
                </div>
                @endforeach
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('campanha.listar') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
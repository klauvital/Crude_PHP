@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Editar Produto</h3>
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
    <form action="{{ route('produto.atualizar', $produto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Produto</label>
            <input type="text" name="nome" id="nome" class="form-control text-capitalize" rows="2" maxlength="300" value="{{ old('nome', $produto->nome) }}" required>
        </div>

        <div class=" mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control text-capitalize" rows="4" maxlength="600" value="{{ old('descricao', $produto->descricao) }}" required>
        </div>

        <div class=" mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input type="number" step="0.01" min="0" name="valor" id="valor" class="form-control" value="{{ old('valor', $produto->valor) }}" required>
        </div>
        <div class="mt-3">
            <button type="submit" class=" btn btn-success">Salvar</button>
            <a href="{{ route('produto.listar') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Editar Desconto</h3>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('desconto.atualizar', $desconto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="campanha_id" class="form-label">Campanha</label>
            <select name="campanha_id" class="form-control">
                @foreach($campanhas as $campanha)
                <option value="{{ $campanha->id }}"
                    {{ $campanha->id == $desconto->campanha_id ? 'selected' : '' }}>
                    {{ $campanha->nome_campanha }}
                </option>
                @endforeach
            </select>
            </select>
        </div>

        <div class="mb-3">
            <label for="valor_total" class="form-label">Valor Total</label>
            <input type="number" step="0.01" name="valor_total" class="form-control" value="{{ old('valor_total', $desconto->valor_total) }}">
        </div>
        <div class="mb-3">
            <label for="percentual_desconto" class="form-label">Percentual do Desconto (%)</label>
            <input type="number" step="0.01" name="percentual_desconto" class="form-control" value="{{ old('percentual_desconto', $desconto->percentual_desconto) }}">
        </div>

        <div class="mb-3">
            <label for="valor_desconto" class="form-label">Valor do Desconto</label>
            <input type="number" step="0.01" name="valor_desconto" class="form-control" value="{{ old('valor_desconto', $desconto->valor_desconto) }}">
        </div>



        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('desconto.listar') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
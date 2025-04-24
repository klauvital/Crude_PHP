@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Novo Desconto</h3>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('desconto.salvar') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="campanha_id" class="form-label">Campanha</label>
            <select name="campanha_id" id="campanha_id" class="form-select">
                <option value="">Selecione uma campanha</option>
                @foreach(\App\Models\Campanha::all() as $campanha)
                <option value="{{ $campanha->nome }}" {{ old('campanha_nome') == $campanha->nome ? 'selected' : '' }}>
                    {{ $campanha->nome }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="valor_total" class="form-label">Valor Total</label>
            <input type="number" step="0.01" name="valor_total" class="form-control" value="{{ old('valor_total') }}">
        </div>

        <div class="mb-3">
            <label for="valor_desconto" class="form-label">Valor do Desconto</label>
            <input type="number" step="0.01" name="valor_desconto" class="form-control" value="{{ old('valor_desconto') }}">
        </div>

        <div class="mb-3">
            <label for="percentual_desconto" class="form-label">Percentual do Desconto (%)</label>
            <input type="number" step="0.01" name="percentual_desconto" class="form-control" value="{{ old('percentual_desconto') }}">
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('desconto.listar') }}" class="btn btn-secondary">Cancelar</a>
</div>
@endsection
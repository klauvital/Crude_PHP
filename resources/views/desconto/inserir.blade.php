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
            <select name="campanha_id" class="form-control">
                <option value="">Selecione uma campanha</option>
                @foreach($campanhas as $campanha)
                <option value="{{ $campanha->id }}">{{ $campanha->nome_campanha }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="valor_total" class="form-label">Valor Total</label>
            <input type="number" step="0.01" name="valor_total" class="form-control" value="{{ old('valor_total') }}">
        </div>


        <div class="mb-3">
            <label for="percentual_desconto" class="form-label">Percentual do Desconto (%)</label>
            <input type="number" step="0.01" name="percentual_desconto" class="form-control" value="{{ old('percentual_desconto') }}">
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('desconto.listar') }}" class="btn btn-secondary">Cancelar</a>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const valorTotal = document.getElementById('valor_total');
        const percentualDesconto = document.getElementById('percentual_desconto');
        const valorDesconto = document.getElementById('valor_desconto');

        function calcularDesconto() {
            const total = parseFloat(valorTotal.value) || 0;
            const percentual = parseFloat(percentualDesconto.value) || 0;

            const desconto = (percentual / 100) * total;
            valorDesconto.value = desconto.toFixed(2);
        }

        valorTotal.addEventListener('input', calcularDesconto);
        percentualDesconto.addEventListener('input', calcularDesconto);
    });
</script>
@endsection
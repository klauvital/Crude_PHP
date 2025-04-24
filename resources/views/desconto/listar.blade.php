@extends('layouts.app')

@section('content')
<h3 class="mb-4">Descontos nas Campanhas</h3>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<a href="{{ route('desconto.inserir') }}" class="btn btn-success mb-3">Inserir</a>

@if($descontos->isEmpty())
<p>Não há descontos cadastrados.</p>
@else
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Campanha</th>
            <th>Valor da Campanha</th>

            <th>Percentual Desconto (%)</th>
            <th>Desconto Calculado</th>
            <th>Valor Líquido da Campanha</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($descontos as $desconto)
        <tr>
            <td>{{ $desconto->id }}</td>
            <td>{{ $desconto->campanha->nome_campanha ?? 'Sem campanha' }}</td>
            <td>{{ number_format($desconto->valor_total, 2, ',', '.') ?? '-' }}</td>

            <td>{{ $desconto->percentual_desconto ?? '-' }}</td>
            <td>
                @php
                $descontoCalculado = ($desconto->percentual_desconto / 100) * $desconto->valor_total;
                @endphp
                {{ number_format($descontoCalculado, 2, ',', '.') }}
            </td>
            <td>
                @php
                $valorLiquido = $desconto->valor_total - $descontoCalculado;
                @endphp
                {{ number_format($valorLiquido, 2, ',', '.') }}
            </td>
            <td>
                <a href="{{ route('desconto.editar', $desconto->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('desconto.excluir', $desconto->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este desconto?')">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection
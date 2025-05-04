@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Listar Campanhas</h3>

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

    <a href="{{ route('campanha.inserir') }}" class="btn btn-success mb-3">Inserir</a>
    <a href="{{ route('home') }}" class="btn btn-secondary mb-3">Home</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Data</th>
                <th>Status</th>
                <th>Grupo de Cidades</th>
                <th>Produtos</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($campanhas as $campanha)
            <tr>
                <td class="text-capitalize">{{ $campanha->nome_campanha }}</td>
                <td>{{ \Carbon\Carbon::parse($campanha->data)->format('d/m/Y') }}</td>
                <td>{{ $campanha->status ? 'Ativa' : 'Inativa' }}</td>
                <td class="text-capitalize">{{ $campanha->grupoCidade->nome_grupo ?? '—' }}</td>
                <td>
                    @foreach ($campanha->produtos as $produto)
                    {{ $produto->nome }}@if (!$loop->last), @endif
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('campanha.editar', $campanha->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <button class="btn btn-sm btn-danger btn-excluir" data-id="{{ $campanha->id }}" data-nome="{{ $campanha->nome_campanha }}">
                        Excluir
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.btn-excluir').on('click', function() {
            const id = $(this).data('id');
            const nome = $(this).data('nome');
            const button = $(this);

            if (confirm('Deseja realmente excluir a campanha "' + nome + '"?')) {
                $.ajax({
                    url: '/campanha/excluir/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            button.closest('tr').fadeOut(300, function() {
                                $(this).remove();
                            });
                        } else {
                            alert('Erro ao excluir.');
                        }
                    },
                    error: function() {
                        alert('Erro ao excluir.');
                    }
                });
            }
        });
    });
</script>
@endsection
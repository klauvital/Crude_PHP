@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Listar Grupo de Cidades</h3>

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
    <a href="{{ route('grupo_cidade.inserir') }}" class="btn btn-success mb-3">Inserir</a>
    <a href="{{ route('home') }}" class="btn btn-secondary mb-3">Home</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Grupo</th>
                <th>Cidades</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($grupos as $grupo)
            <tr>
                <td class="text-capitalize">{{ $grupo->nome_grupo }}</td>
                <td class="text-capitalize">
                    @foreach ($grupo->relacoes as $relacao)
                    {{ $relacao->cidade->nome }}
                    @if (!$loop->last), @endif
                    @endforeach
                </td>
                <td class="text-capitalize">
                    <a href="{{ route('grupo_cidade.editar', $grupo->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <button class="btn btn-sm btn-danger btn-excluir" data-id="{{ $grupo->id }}" data-nome="{{ $grupo->nome_grupo }}">
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

            if (confirm('Deseja mesmo excluir o grupo de cidades: ' + nome + '?')) {
                $.ajax({
                    url: '/grupo-cidade/excluir/' + id, // Corrigido aqui
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            // Remove a linha da tabela
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
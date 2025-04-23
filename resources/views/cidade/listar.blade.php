@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Lista de Cidades</h3>
    <a href="{{ route('cidade.inserir') }}" class="btn btn-success mb-3">Inserir</a>
    <a href="{{ route('home') }}" class="btn btn-secondary mb-3">Home</a>
    <table class="table table-bordered">
        <thead>
            <tr>

                <th>Nome</th>
                <th>Estado</th>
                <th>Ações</th>
            </tr>
            @foreach ($cidades as $cidade)
            <tr>

                <td class="text-capitalize">{{ $cidade->nome }}</td>

                <td class="text-uppercase">{{ $cidade->estado->sigla ?? '' }}</td>


                </td>
                <td>
                    <a href="{{ route('cidade.editar', $cidade->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <a href="{{ route('cidade.excluir', $cidade->id) }}" class="btn btn-sm btn-danger"
                        onclick="return confirm('Deseja excluir?')">Excluir</a>
                </td>
            </tr>
            @endforeach
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.btn-excluir').on('click', function() {
            const id = $(this).data('id');
            const nome = $(this).data('nome');
            const button = $(this);

            if (confirm('Deseja mesmo deletar o estado: ' + nome + '?')) {
                $.ajax({
                    url: '/estado/' + id + '/excluir',
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
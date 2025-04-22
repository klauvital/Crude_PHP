@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Estados</h1>

    <a href="{{ route('estado.inserir') }}" class="btn btn-success mb-3">Novo Estado</a>
    <a href="{{ route('home') }}" class="btn btn-secondary mb-3">Home</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sigla</th>
                <th>Acões</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estados as $estado)
            <tr>
                <td>{{ $estado->id }}</td>
                <td>{{ $estado->nome }}</td>
                <td>{{ $estado->sigla }}</td>
                <td>
                    <a href="{{ route('estado.editar', $estado->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <button class="btn btn-sm btn-danger btn-excluir" data-id="{{ $estado->id }}" data-nome="{{ $estado->nome }}">
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
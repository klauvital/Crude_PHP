@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Lista de Produtos</h3>
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

    <a href="{{ route('produto.inserir') }}" class="btn btn-success mb-3">Inserir</a>
    <a href="{{ route('home') }}" class="btn btn-secondary mb-3">Home</a>
    <table class="table table-bordered">
        <thead>
            <tr>

                <th>Nome</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Acões</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
            <tr>

                <td class="text-capitalize">{{ $produto->nome }}</td>
                <td class="text-capitalize">{{ $produto->descricao }}</td>
                <td class="">{{ $produto->valor }}</td>
                <td>
                    <div style="display: flex; flex-direction: row; gap: 10px;">
                        <a href="{{ route('produto.editar', $produto->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <button class="btn btn-sm btn-danger btn-excluir" data-id="{{ $produto->id }}" data-nome="{{ $produto->nome }}">
                            Excluir
                        </button>


                    </div>



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

            if (confirm('Deseja mesmo excluir o produto : ' + nome + '?')) {
                $.ajax({
                    url: '/produto/excluir/' + id,
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
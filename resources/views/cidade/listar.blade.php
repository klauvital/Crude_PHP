<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de Cidades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-5 bg-light">

    <div class="container">
        <h1 class="mb-4">Lista de Cidades</h1>

        <a href="{{ route('cidade.inserir') }}" class="btn btn-success mb-3">Nova Cidade</a>

        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cidades as $cidade)
                <tr>
                    <td>{{ $cidade->id }}</td>
                    <td>{{ $cidade->nome }}</td>
                    <td>{{ $cidade->estado->nome }} ({{ $cidade->estado->sigla }})</td>
                    <td>
                        <a href="{{ route('cidade.edit', $cidade->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('cidade.destroy', $cidade->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir esta cidade?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
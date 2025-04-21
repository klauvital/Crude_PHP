<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de Estados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-5">

    <div class="container">
        <h1>Lista de Estados</h1>

        <a href="{{ route('estado.inserir') }}" class="btn btn-success mb-3">Novo Estado</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sigla</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($estados as $estado)
                <tr>
                    <td>{{ $estado->id }}</td>
                    <td>{{ $estado->nome }}</td>
                    <td>{{ $estado->sigla }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>

</html>
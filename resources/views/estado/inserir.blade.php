<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Estado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light p-5">

    <div class="container">
        <h1 class="mb-4">Cadastrar Estado</h1>

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

        <form action="{{ route('estado.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Estado</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Ex: São Paulo" value="{{ old('nome') }}" required>
            </div>

            <div class="mb-3">
                <label for="sigla" class="form-label">Sigla</label>
                <input type="text" name="sigla" id="sigla" class="form-control" placeholder="Ex: SP" value="{{ old('sigla') }}" maxlength="2" required>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>

</body>

</html>
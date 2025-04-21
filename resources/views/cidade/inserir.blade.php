<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Inserir Cidade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-5 bg-light">

    <div class="container">
        <h1 class="mb-4">Cadastrar Cidade</h1>

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

        <form action="{{ route('cidade.detalhes') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nome" class="form-label">Nome da Cidade</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
            </div>

            <div class="mb-3">
                <label for="id_estado" class="form-label">Estado</label>
                <select name="id_estado" id="id_estado" class="form-select" required>
                    <option value="">Selecione o Estado</option>
                    @foreach ($estados as $estado)
                    <option value="{{ $estado->id }}" {{ old('id_estado') == $estado->id ? 'selected' : '' }}>
                        {{ $estado->nome }} ({{ $estado->sigla }})
                    </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>

        <a href="{{ route('cidade.listar') }}" class="btn btn-secondary mt-3">Voltar para Lista</a>
    </div>

</body>

</html>
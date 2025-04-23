<!DOCTYPE html>
<html>

<head>
    <title>Desafio WEB Backend</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .navbar-nav .nav-link {
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link {
            color: #ffc107 !important;

        }

        .navbar-nav .nav-link:hover {
            color: rgb(246, 245, 244) !important;
            /* cor amarela bonita no hover */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #343a40;">
        <div class="container-fluid">

            <a class="navbar-brand" style="color: #ffc107" href="{{ url('/') }}">Desafio WEB Backend</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('estado.listar') }}">Estados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('cidade.listar') }}">Cidades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('grupo_cidade.listar') }}">Grupos de Cidades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">Campanhas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">Desconto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">Produtos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
</body>

</html>
@extends('layouts.app')

@section('content')
<!-- Conteúdo principal -->
<div class="container mt-5">
    <h1 class="mb-4 text-center">TESTE CRIAR</h1>

    <div class="mb-4">
        <p>Nome: <b>{{ $usuario }}</b></p>
        <p>Vaga: <b>{{ $perfil }}</b></p>
        <p>Área: <b>{{ $area }}</b></p>
        <p>Empresa: <b>{{ $empresa }}</b></p>
        <p>Data Início: <b>17/04/2025</b></p>

    </div>

    <h2 class="mt-4">Detalhes do Desafio</h2>
    <p>Montar uma API RESTful com Laravel para alimentar uma SPA com as seguintes funções:</p>
    <ul>
        <li>Cadastrar/Editar/Listar/Excluir estados</li>
        <li>Cadastrar/Editar/Listar/Excluir cidades</li>
        <li>Cadastrar/Editar/Listar/Excluir grupo de cidades (cluster)</li>
        <li>Cadastrar/Editar/Listar/Excluir campanhas para o grupo de cidades onde cada grupo possui somente uma campanha ativa</li>
        <li>Cadastrar/Editar/Listar/Excluir desconto em valor e em percentual da campanha</li>
        <li>Cadastrar/Editar/Listar/Excluir produtos</li>
    </ul>
    <p>Cada cidade possui somente um grupo.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
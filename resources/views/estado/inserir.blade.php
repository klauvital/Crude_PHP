@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Cadastrar Estado</h3>

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
            <input type="text" name="nome" id="nome" class="form-control text-capitalize" placeholder="Ex: São Paulo" value="{{ old('nome') }}" required>
        </div>

        <div class="mb-3">
            <label for="sigla" class="form-label">Sigla</label>
            <input type="text" name="sigla" id="sigla" class="form-control text-uppercase" placeholder="Ex: SP" value="{{ old('sigla') }}" maxlength="2" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
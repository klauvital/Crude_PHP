@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Cadastrar Cidade</h3>

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

    <form action="{{ route('cidade.salvar') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Cidade</label>
            <input class="form-control text-capitalize" type="text" name="nome" id="nome" required>
        </div>

        <div class="mb-3">
            <label for="id_estado" class="form-label">Estado:</label>
            <select class="form-select text-uppercase" name="id_estado" id="id_estado" required>
                <option class="text-capitalize" value="">Selecione</option>
                @foreach ($estados as $estado)
                <option class="text-uppercase" value="{{ $estado->id }}">{{ $estado->sigla }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success" type="submit">Salvar</button>
    </form>
</div>
@endsection
<h1> Inserir Cidade</h1>

@if(session('success'))
<p style="color: green;">{{ session('success') }}</p>
@endif

<form method="post">
    @csrf

    <b>Sigla do estado</b>
    <input type="text" name="estado" required><br><br>

    <b>Nome da cidade</b>
    <input type="text" name="cidade" required ><br><br>

    <input type="submit" name="action" value="Salvar">
    <a href="{{ route('inserir_cidade') }}">
        <button type="button">Limpar</button>
</form>

<hr>

@if(session('nome') && session('sigla'))
<label>Nome: {{ session('nome') }}</label><br>
<label>Sigla: {{ session('sigla') }}</label><br>
@endif
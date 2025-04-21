<h1> Inserir Estado</h1>

@if(session('success'))
<p style="color: green;">{{ session('success') }}</p>
@endif

<form method="post">
    @csrf

    <b>Nome do Estado</b>
    <input type="text" name="nome" required><br><br>

    <b>Sigla do Estado</b>
    <input type="text" name="sigla" required maxlength="2" pattern="[A-Za-z]{2}" title="Digite apenas duas letras"><br><br>

    <input type="submit" name="action" value="Salvar">
    <a href="{{ route('inserir_estado') }}">
        <button type="button">Limpar</button>
</form>

<hr>

@if(session('nome') && session('sigla'))
<label>Nome: {{ session('nome') }}</label><br>
<label>Sigla: {{ session('sigla') }}</label><br>
@endif
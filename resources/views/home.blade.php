<h1>Desafio WEB Backend </h1>

<p>Nome : <b>{{$usuario}}</b></p>
<p>Vaga : <b>{{$perfil}}</b></p>
<p>Área : <b>{{$area}}</b></p>
<p>Empresa: <b>{{$empresa}}</b></p>
<p>Data Início: <b>{{$data}}</b></p>


<h2>Menu </h2>


<h3><a href="{{ route('listar_estado') }}">Estados</a></h3>
<h3><a href="{{ route('listar_cidades') }}">Cidades</h3>
<h3><a href="{{ route('listar_grupos') }}">Grupos de UF/Cidades</h3>
<h3><a href="{{ route('listar_campanhas') }}">Campanhas</h3>
<h3><a href="{{ route('listar_descontos') }}">Desconto</h3>
<h3><a href="{{ route('listar_produtos') }}">Produtos</h3>

<h2>Detalhes do Desafio</h2>
Montar uma api RESTful com Laravel para alimentar uma SPA com as seguintes
funções:
○ Cadastrar/Editar/Listar/Excluir estados;
○ Cadastrar/Editar/Listar/Excluir cidades;
○ Cadastrar/Editar/Listar/Excluir grupo de cidades (cluster);
○ Cadastrar/Editar/Listar/Excluir campanhas para o grupo de cidades onde cada
grupo possui somente uma campanha ativa;
○ Cadastrar/Editar/Listar/Excluir desconto em valor e em percentual da
campanha;
○ Cadastrar/Editar/Listar/Excluir produtos;
● As tabelas de relacionamento estão a cargo do candidato;
● Cada cidade possui somente um grupo;
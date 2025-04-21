<?php

use App\Http\Controllers\CidadeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\GruposController;


//Route::get('/', 'HomeController@index'); versões abaixo de 8
Route::get('/', [HomeController::class, 'index']);
Route::get('/estados_inserir', [EstadosController::class, 'inserir_estado']);
Route::post('/estados_inserir', [EstadosController::class, 'inserir_estado'])->name('inserir_estado');



Route::view('/estados_listar', [EstadosController::class, 'listar_estados'])->name('listar_estado');
Route::view('/estados_inserir', [EstadosController::class, 'inserir_estado']);
Route::view('/estados_editar', [EstadosController::class, 'editar_estado']);
Route::view('/estados_excluir', [EstadosController::class, 'excluir_estado']);


Route::view('/cidades_listar', [CidadeController::class, 'listar_cidades'])->name('listar_cidades');
Route::view('/cidades_inserir', [CidadeController::class, 'inserir_cidade'])->name('inserir_cidade');
Route::view('/cidades_editar', [CidadeController::class, 'editar_cidade'])->name('editar_cidade');
Route::view('/cidades_excluir', [CidadeController::class, 'excluir_cidade'])->name('excluir_cidade');

Route::view('/grupos_listar', [GruposController::class, 'listar_grupo'])->name('listar_grupos');


Route::view('/campanhas_listar', [EstadosController::class, 'listar_campanhas'])->name('listar_campanhas');
Route::view('/campanhas_inserir', [EstadosController::class, 'inserir_campanha'])->name('inserir_campanha');
Route::view('/campanhas_editar', [EstadosController::class, 'editar_campanha'])->name('editar_campanha');
Route::view('/campanhas_excluir', [EstadosController::class, 'excluir_campanha'])->name('excluir_campanha');

Route::view('/descontos_listar', [EstadosController::class, 'listar_descontos'])->name('listar_descontos');
Route::view('/descontos_inserir', [EstadosController::class, 'inserir_desconto'])->name('inserir_desconto');
Route::view('/descontos_editar', [EstadosController::class, 'editar_desconto'])->name('editar_desconto');
Route::view('/descontos_excluir', [EstadosController::class, 'excluir_desconto'])->name('excluir_desconto');

Route::view('/produtos_listar', [EstadosController::class, 'listar_produtos'])->name('listar_produtos');
Route::view('/produtos_inserir', [EstadosController::class, 'inserir_produto'])->name('inserir_produto');
Route::view('/produtos_editar', [EstadosController::class, 'editar_produto'])->name('editar_produto');
Route::view('/produtos_excluir', [EstadosController::class, 'excluir_produto'])->name('excluir_produto');

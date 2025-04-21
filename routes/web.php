<?php

use App\Http\Controllers\CidadeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\GruposController;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/estado/inserir', [EstadosController::class, 'adicionar'])->name('estado.inserir'); // Mostrar form
Route::post('/estado/store', [EstadosController::class, 'store'])->name('estado.store'); // Cadastrar Estado
Route::get('/estado/listar', [EstadosController::class, 'listar'])->name('estado.listar'); // Listar Estados





Route::view('/cidade/listar', [CidadeController::class, 'listar'])->name('cidade.listar');
Route::view('/cidade/inserir', [CidadeController::class, 'adicionar'])->name('cidade.inserir');
Route::view('/cidade/editar', [CidadeController::class, 'editar'])->name('cidade.editar');
Route::view('/cidade/excluir', [CidadeController::class, 'excluir'])->name('cidade.excluir');

Route::view('/grupos_listar', [GruposController::class, 'listar_grupo'])->name('listar_grupos');


Route::view('/campanhas/listar', [EstadosController::class, 'listar_campanhas'])->name('listar_campanhas');
Route::view('/campanhas/inserir', [EstadosController::class, 'inserir_campanha'])->name('inserir_campanha');
Route::view('/campanhas/editar', [EstadosController::class, 'editar_campanha'])->name('editar_campanha');
Route::view('/campanhas/excluir', [EstadosController::class, 'excluir_campanha'])->name('excluir_campanha');

Route::view('/descontos/listar', [EstadosController::class, 'listar_descontos'])->name('descontos.listar');
Route::view('/descontos/inserir', [EstadosController::class, 'inserir_desconto'])->name('desconto.inserir');
Route::view('/descontos/editar', [EstadosController::class, 'editar_desconto'])->name('desconto.editar');
Route::view('/descontos/excluir', [EstadosController::class, 'excluir_desconto'])->name('desconto.excluir');

Route::view('/produtos/listar', [EstadosController::class, 'listar_produtos'])->name('produtos.listar');
Route::view('/produtos/inserir', [EstadosController::class, 'inserir_produto'])->name('produto.inserir');
Route::view('/produtos/editar', [EstadosController::class, 'editar_produto'])->name('produto.editar');
Route::view('/produtos/excluir', [EstadosController::class, 'excluir_produto'])->name('produto.excluir');

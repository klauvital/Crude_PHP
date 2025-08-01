<?php

use App\Http\Controllers\CidadeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\CidadesController;
use App\Http\Controllers\GrupoCidadeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CampanhaController;
use App\Http\Controllers\DescontoController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/estado/inserir', [EstadosController::class, 'adicionar'])->name('estado.inserir'); // Mostrar form
Route::post('/estado/store', [EstadosController::class, 'store'])->name('estado.store'); // Cadastrar Estado
Route::get('/estado/listar', [EstadosController::class, 'listar'])->name('estado.listar'); // Listar Estados
Route::get('/estado/{id}/editar', [EstadosController::class, 'editar'])->name('estado.editar'); // Formulário editar
Route::put('/estado/{id}', [EstadosController::class, 'update'])->name('estado.update'); // Salvar edição 
Route::delete('/estado/{id}/excluir', [EstadosController::class, 'excluir'])->name('estado.excluir');


Route::prefix('cidade')->group(function () {
    Route::get('listar', [CidadesController::class, 'listar'])->name('cidade.listar');
    Route::get('inserir', [CidadesController::class, 'inserir'])->name('cidade.inserir');
    Route::post('salvar', [CidadesController::class, 'salvar'])->name('cidade.salvar');
    Route::get('editar/{id}', [CidadesController::class, 'editar'])->name('cidade.editar');
    Route::put('atualizar/{id}', [CidadesController::class, 'atualizar'])->name('cidade.atualizar');
    Route::delete('/excluir/{id}', [CidadesController::class, 'excluir'])->name('cidade.excluir');
});

Route::prefix('grupo-cidade')->group(function () {
    Route::get('/', [GrupoCidadeController::class, 'listar'])->name('grupo_cidade.listar');
    Route::get('/inserir', [GrupoCidadeController::class, 'inserir'])->name('grupo_cidade.inserir');
    Route::post('/salvar', [GrupoCidadeController::class, 'salvar'])->name('grupo_cidade.salvar');
    Route::get('/editar/{id}', [GrupoCidadeController::class, 'editar'])->name('grupo_cidade.editar');
    Route::put('/atualizar/{id}', [GrupoCidadeController::class, 'atualizar'])->name('grupo_cidade.atualizar');
    Route::delete('/excluir/{id}', [GrupoCidadeController::class, 'excluir'])->name('grupo_cidade.excluir');
});

Route::prefix('produto')->group(function () {
    Route::get('listar', [ProdutoController::class, 'listar'])->name('produto.listar');
    Route::get('inserir', [ProdutoController::class, 'adicionar'])->name('produto.inserir');
    Route::post('salvar', [ProdutoController::class, 'store'])->name('produto.salvar');
    Route::get('editar/{id}', [ProdutoController::class, 'editar'])->name('produto.editar');
    Route::put('atualizar/{id}', [ProdutoController::class, 'update'])->name('produto.atualizar');
    Route::delete('excluir/{id}', [ProdutoController::class, 'excluir'])->name('produto.excluir');
});


Route::prefix('campanha')->group(function () {
    Route::get('listar', [CampanhaController::class, 'listar'])->name('campanha.listar');
    Route::get('inserir', [CampanhaController::class, 'adicionar'])->name('campanha.inserir');
    Route::post('salvar', [CampanhaController::class, 'store'])->name('campanha.salvar');
    Route::get('editar/{id}', [CampanhaController::class, 'editar'])->name('campanha.editar');
    Route::put('atualizar/{id}', [CampanhaController::class, 'update'])->name('campanha.atualizar');
    Route::delete('excluir/{id}', [CampanhaController::class, 'excluir'])->name('campanha.excluir');
});

Route::prefix('desconto')->group(function () {
    Route::get('listar', [DescontoController::class, 'index'])->name('desconto.listar');
    Route::get('inserir', [DescontoController::class, 'create'])->name('desconto.inserir');
    Route::post('salvar', [DescontoController::class, 'store'])->name('desconto.salvar');
    Route::get('editar/{id}', [DescontoController::class, 'edit'])->name('desconto.editar');
    Route::put('atualizar/{id}', [DescontoController::class, 'update'])->name('desconto.atualizar');
    Route::delete('excluir/{id}', [DescontoController::class, 'destroy'])->name('desconto.excluir');
});

Route::prefix('desconto')->group(function () {
    Route::get('listar', [DescontoController::class, 'index'])->name('desconto.listar');
    Route::get('inserir', [DescontoController::class, 'create'])->name('desconto.inserir');
    Route::post('salvar', [DescontoController::class, 'store'])->name('desconto.salvar');
    Route::get('editar/{id}', [DescontoController::class, 'edit'])->name('desconto.editar');
    Route::put('atualizar/{id}', [DescontoController::class, 'update'])->name('desconto.atualizar');
    Route::delete('excluir/{id}', [DescontoController::class, 'destroy'])->name('desconto.excluir');
});

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CidadeController extends Controller
{
    public function listar()
    {
        return view('cidade.listar');
    }

    public function adicionar()
    {
        return view('estado.inserir');
    }


    public function editar()
    {
        return view('estado.editar');
    }
    public function excluir_estado()
    {
        return view('estado.excluir');
    }
}

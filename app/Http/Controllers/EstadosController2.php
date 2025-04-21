<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class EstadosController extends Controller
{
    public function listar_estados()
    {
        return view('listar_estados');
    }

    public function inserir_estado(Request $request)
    {
        $action = $request->input('action');

        if ($action == 'Limpar') {
            // limpar mensagem, sigla e estado
            return redirect()->route('inserir_estado');
        }

        $nome = $request->input('nome');
        $sigla = $request->input('sigla');

        return redirect()->back()->with([
            'nome' => $nome,
            'sigla' => $sigla,
            'success' => 'Estado inserido com sucesso!',
        ]);
    }


    public function editar_estado()
    {
        return view('editar_estado');
    }
    public function excluir_estado()
    {
        return view('excluir_estado');
    }
}

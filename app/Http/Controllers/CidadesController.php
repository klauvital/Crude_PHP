<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CidadeController extends Controller
{
    public function listar_cidades()
    {
        return view('listar_cidades');
    }

    public function inserir_cidade(Request $request)
    {
        $action = $request->input('action');

        if ($action == 'Limpar') {
            // limpar mensagem, sigla e estado
            return redirect()->route('inserir_cidade');
        }

        $cidade = $request->input('cidade');
        $estado = $request->input('estado');

        return redirect()->back()->with([
            'cidade' => $cidade,
            'estado' => $estado,
            'success' => 'Cidade inserido com sucesso!',
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

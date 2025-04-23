<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;
use App\Models\GrupoCidade;
use App\Models\GrupoCidadeRelacao;


class GrupoCidadeController extends Controller
{
    public function listar()
    {
        $grupos = GrupoCidade::with('relacoes.cidade')->orderBy('nome_grupo')->get();
        return view('grupo_cidade.listar', compact('grupos'));
    }

    public function inserir()
    {
        $cidades = Cidade::orderBy('nome')->get();
        return view('grupo_cidade.inserir', compact('cidades'));
    }

    public function salvar(Request $request)
    {
        $request->validate([
            'nome_grupo' => 'required|string|max:255',
            'cidades' => 'required|array|min:1',
        ]);

        $grupo = GrupoCidade::create([
            'nome_grupo' => $request->nome_grupo,
        ]);

        foreach ($request->cidades as $cidadeId) {
            GrupoCidadeRelacao::create([
                'id_grupo_cidades' => $grupo->id,
                'id_cidade' => $cidadeId,
            ]);
        }

        return redirect()->route('grupo_cidade.listar')->with('success', 'Grupo criado com sucesso!');
    }

    public function editar($id)
    {
        $grupo = GrupoCidade::findOrFail($id);
        $cidades = Cidade::orderBy('nome')->get();
        $cidadesSelecionadas = $grupo->relacoes->pluck('id_cidade')->toArray();

        return view('grupo_cidade.editar', compact('grupo', 'cidades', 'cidadesSelecionadas'));
    }

    public function atualizar(Request $request, $id)
    {
        $request->validate([
            'nome_grupo' => 'required|string|max:255',
            'cidades' => 'required|array|min:1',
        ]);

        $grupo = GrupoCidade::findOrFail($id);
        $grupo->update(['nome_grupo' => $request->nome_grupo]);

        GrupoCidadeRelacao::where('id_grupo_cidades', $id)->delete();

        foreach ($request->cidades as $cidadeId) {
            GrupoCidadeRelacao::create([
                'id_grupo_cidades' => $grupo->id,
                'id_cidade' => $cidadeId,
            ]);
        }

        return redirect()->route('grupo_cidade.listar')->with('success', 'Grupo atualizado com sucesso!');
    }

    public function excluir($id)
    {
        $grupo = GrupoCidade::findOrFail($id);
        $grupo->delete();

        return response()->json(['success' => true, 'message' => 'Grupo de cidades excluído com sucesso.']);
    }
}

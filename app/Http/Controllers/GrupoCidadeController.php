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
        $cidadesDisponiveis = Cidade::doesntHave('grupoCidadeRelacao')->orderBy('nome')->get();
        return view('grupo_cidade.inserir', compact('cidadesDisponiveis'));
    }

    public function salvar(Request $request)
    {
        $request->validate([
            'nome_grupo' => 'required|string|max:255',
            'cidades' => 'required|array|min:1',
        ]);

        // Verifica duplicidade pelo nome
        $existe = GrupoCidade::where('nome_grupo', $request->nome_grupo)->exists();
        if ($existe) {
            return redirect()->back()
                ->withErrors(['duplicado' => "{$request->nome_grupo} - Grupo já existe com este nome."])
                ->withInput();
        }

        // Verifica se alguma cidade já está em outro grupo
        foreach ($request->cidades as $idCidade) {
            $jaRelacionado = GrupoCidadeRelacao::where('id_cidade', $idCidade)->first();
            if ($jaRelacionado) {
                $nomeCidade = Cidade::find($idCidade)->nome;
                return redirect()->back()->withErrors(["$nomeCidade já pertence a um grupo."])->withInput();
            }
        }

        // Agora sim: cria o grupo
        $grupo = GrupoCidade::create([
            'nome_grupo' => $request->nome_grupo,
        ]);

        // Associa as cidades ao grupo
        foreach ($request->cidades as $cidadeId) {
            GrupoCidadeRelacao::create([
                'id_grupo_cidades' => $grupo->id,
                'id_cidade' => $cidadeId,
            ]);
        }

        return redirect()->route('grupo_cidade.listar')->with('success', 'Grupo criado com sucesso!');
    }


    public function editar(Request $request, $id)
    {
        $grupo = GrupoCidade::with('relacoes.cidade')->findOrFail($id);
        // IDs das cidades já nesse grupo
        $idsCidadesDoGrupo = $grupo->relacoes->pluck('id_cidade');

        // IDs das cidades já nesse grupo
        $idsCidadesDoGrupo = $grupo->relacoes->pluck('id_cidade');

        // Cidades que ainda não têm grupo OU já estão nesse grupo
        $cidadesDisponiveis = Cidade::whereDoesntHave('grupoCidadeRelacao', function ($query) use ($id) {
            $query->where('id_grupo_cidades', '!=', $id);
        })->orWhereIn('id', $idsCidadesDoGrupo)->orderBy('nome')->get();

        return view('grupo_cidade.editar', compact('grupo', 'cidadesDisponiveis'));
    }

    public function atualizar(Request $request, $id)
    {
        $request->validate([
            'nome_grupo' => 'required|string|max:255',
            'cidades' => 'required|array|min:1',
        ]);
        // Verifica duplicidade pelo nome
        $existe = GrupoCidade::where('nome_grupo', $request->nome_grupo)->exists();
        if ($existe) {
            return redirect()->back()
                ->withErrors(['duplicado' => "{$request->nome_grupo} - Grupo já existe com este nome."])
                ->withInput();
        }

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

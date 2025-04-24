<?php

namespace App\Http\Controllers;

use App\Models\Campanha;
use App\Models\GrupoCidade;
use App\Models\Produto;
use App\Models\CampanhaProdutoRelacao;
use Illuminate\Http\Request;

class CampanhaController extends Controller
{
    public function adicionar()
    {
        $grupo_cidades = GrupoCidade::orderBy('nome_grupo')->get();
        $produtos = Produto::orderBy('nome')->get();
        return view('campanha.inserir', compact('grupo_cidades', 'produtos'));
    }

    public function store(Request $request)
    {
        $dados = $request->only([
            'data',
            'nome_campanha',
            'status',
            'id_grupo_cidades'
        ]);

        // Evita duplicidade de nome
        if (Campanha::where('nome_campanha', $request->nome_campanha)->exists()) {
            return redirect()->back()
                ->withErrors(['nome_campanha' => "{$request->nome_campanha} - Campanha já está cadastrada."])
                ->withInput();
        }

        // Business rule: only one active campaign per grupo_cidades
        if ($request->status == 1) {
            $activeCampanha = Campanha::where('id_grupo_cidades', $request->id_grupo_cidades)
                ->where('status', 1)
                ->first();
            if ($activeCampanha) {
                return redirect()->back()
                    ->withErrors(['status' => "Já existe uma campanha ativa para este grupo de cidades."])
                    ->withInput();
            }
        }

        $campanha = Campanha::create([
            'data' => $request->data,
            'nome_campanha' => $request->nome_campanha,
            'status' => $request->status,
            'id_grupo_cidades' => $request->id_grupo_cidades,
        ]);

        // Relaciona produtos se enviados
        if ($request->has('produtos')) {
            foreach ($request->produtos as $produtoId) {
                CampanhaProdutoRelacao::create([
                    'id_campanha' => $campanha->id,
                    'id_produto' => $produtoId,
                ]);
            }
        }

        return redirect()->route('campanha.listar')->with('success', 'Campanha cadastrada com sucesso!');
    }

    public function listar()
    {
        $campanhas = Campanha::with(['grupoCidade', 'produtos'])->orderBy('nome_campanha')->get();
        return view('campanha.listar', compact('campanhas'));
    }

    public function editar($id)
    {
        $campanha = Campanha::with('produtos')->findOrFail($id);
        $grupo_cidades = GrupoCidade::orderBy('nome_grupo')->get();
        $produtos = Produto::orderBy('nome')->get();

        return view('campanha.editar', compact('campanha', 'grupo_cidades', 'produtos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'data' => 'required|date',
            'nome_campanha' => 'required|string|max:200',
            'status' => 'required|boolean',
            'id_grupo_cidades' => 'required|exists:grupo_cidades,id',
            'produtos' => 'nullable|array',
        ]);

        $campanha = Campanha::findOrFail($id);

        // Verifica duplicidade ignorando o próprio ID
        $campanhaExistente = Campanha::where('nome_campanha', $request->nome_campanha)
            ->where('id', '!=', $id)
            ->first();

        if ($campanhaExistente) {
            return redirect()->back()
                ->withErrors(['nome_campanha' => "{$request->nome_campanha} - Campanha já está cadastrada."])
                ->withInput();
        }

        // Business rule: only one active campaign per grupo_cidades
        if ($request->status == 1) {
            $activeCampanha = Campanha::where('id_grupo_cidades', $request->id_grupo_cidades)
                ->where('status', 1)
                ->where('id', '!=', $id)
                ->first();
            if ($activeCampanha) {
                return redirect()->back()
                    ->withErrors(['status' => "Já existe uma campanha ativa para este grupo de cidades."])
                    ->withInput();
            }
        }

        $campanha->update([
            'data' => $request->data,
            'nome_campanha' => $request->nome_campanha,
            'status' => $request->status,
            'id_grupo_cidades' => $request->id_grupo_cidades,
        ]);

        // Atualiza os produtos relacionados
        CampanhaProdutoRelacao::where('id_campanha', $campanha->id)->delete();

        if ($request->has('produtos')) {
            foreach ($request->produtos as $produtoId) {
                CampanhaProdutoRelacao::create([
                    'id_campanha' => $campanha->id,
                    'id_produto' => $produtoId,
                ]);
            }
        }

        return redirect()->route('campanha.listar')->with('success', 'Campanha atualizada com sucesso.');
    }

    public function excluir($id)
    {
        $campanha = Campanha::findOrFail($id);
        $campanha->delete();

        return response()->json(['success' => true, 'message' => 'Campanha excluída com sucesso.']);
    }
}

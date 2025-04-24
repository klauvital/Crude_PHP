<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    public function adicionar()
    {
        return view('produto.inserir');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:50',
            'descricao' => 'required|string|max:200',
            'valor' => 'required|numeric',
        ]);

        $produtoExistente = Produto::where('nome', $request->nome)
            ->first();

        if ($produtoExistente) {
            return redirect()->back()
                ->withErrors(['nome' => "{$request->nome} - Produto já está cadastrado."])
                ->withInput();
        }

        Produto::create($request->only('nome', 'descricao', 'valor'));

        return redirect()->route('produto.listar')->with('success', 'Produto cadastrado com sucesso!');
    }

    public function listar()
    {
        $produtos = Produto::orderBy('nome', 'asc')->get();
        return view('produto.listar', compact('produtos'));
    }

    public function editar($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produto.editar', compact('produto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:200',
            'valor' => 'required|numeric',
        ]);
        $produto = Produto::findOrFail($id);
        // Verifica se o produto esta cadastrado
        $produtoExistente = Produto::where('nome', $request->nome)
            ->where('id', '!=', $id)
            ->first();

        if ($produtoExistente) {
            return redirect()->back()
                ->withErrors(['nome' => "{$request->nome} -  Produto já está cadastrado."])
                ->withInput();
        }


        $produto->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'valor' => $request->valor,
        ]);


        return redirect()->route('produto.listar')->with('success', 'Produto atualizado com sucesso.');
    }

    public function excluir($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return response()->json(['success' => true, 'message' => 'Produto de cidades excluído com sucesso.']);
    }
}

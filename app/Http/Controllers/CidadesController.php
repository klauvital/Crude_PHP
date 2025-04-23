<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;
use App\Models\Estado;

class CidadesController extends Controller
{
    public function listar()
    {
        $estados = Estado::all();
        $cidades = Cidade::orderBy('nome', 'asc')->get();

        return view('cidade.listar', compact('cidades', 'estados'));
    }

    public function inserir()
    {
        $estados = Estado::orderBy('sigla')->get();
        return view('cidade.inserir', compact('estados'));
    }

    public function salvar(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'id_estado' => 'required|exists:estados,id',
        ]);

        // Verifica se a cidade já existe no mesmo estado
        $cidadeExistente = Cidade::where('nome', $request->nome)
            ->where('id_estado', $request->id_estado)
            ->first();

        if ($cidadeExistente) {
            return redirect()->back()
                ->withErrors(['duplicado' => "{$request->nome} - Cidade já existe para este estado."])
                ->withInput();
        }

        Cidade::create([
            'nome' => $request->nome,
            'id_estado' => $request->id_estado,
        ]);

        return redirect()->route('cidade.listar')->with('success', 'Cidade cadastrada com sucesso!');
    }


    public function editar($id)
    {
        $cidade = Cidade::findOrFail($id);
        $estados = Estado::orderBy('sigla')->get();
        return view('cidade.editar', compact('cidade', 'estados'));
    }

    public function atualizar(Request $request, $id)
    {
        $cidade = Cidade::findOrFail($id);

        // Verifica duplicidade: outra cidade com mesmo nome e estado
        $existe = Cidade::where('nome', $request->nome)
            ->where('id_estado', $request->id_estado)
            ->where('id', '!=', $id)
            ->exists();

        if ($existe) {
            return redirect()->back()
                ->withErrors(['duplicado' => "{$request->nome} - Cidade já existe para este estado."])
                ->withInput();
        }

        $request->validate([
            'nome' => 'required',
            'id_estado' => 'required',
        ]);

        $cidade->update([
            'nome' => $request->nome,
            'id_estado' => $request->id_estado,
        ]);

        return redirect()->route('cidade.listar')->with('success', 'Cidade atualizada com sucesso!');
    }


    public function excluir($id)
    {
        $cidade = Cidade::findOrFail($id);
        $cidade->delete();

        return response()->json(['success' => true, 'message' => 'Grupo de cidades excluído com sucesso.']);
    }
}

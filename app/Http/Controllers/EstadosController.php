<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;

class EstadosController extends Controller
{

    public function adicionar()
    {
        return view('estado.inserir');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:50',
            'sigla' => 'required|string|max:2',
        ]);
        // Verifica se o estado esta cadastrado
        $estadoExistente = Estado::where('nome', $request->nome)
            ->where('sigla', $request->sigla)
            ->first();

        if ($estadoExistente) {
            return redirect()->back()
                ->withErrors(['nome' => "{$request->nome} -  Estado já está cadastrado."])
                ->withInput();
        }
        Estado::create($request->only('nome', 'sigla'));

        return redirect()->route('estado.listar')->with('success', 'Estado cadastrado com sucesso!');
    }

    public function listar()
    {

        $estados = Estado::orderBy('nome', 'asc')->get();
        return view('estado.listar', compact('estados'));
    }

    public function editar($id)
    {

        $estado = Estado::findOrFail($id);
        return view('estado.editar', compact('estado'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'sigla' => 'required|string|max:2',
        ]);
        $estado = Estado::findOrFail($id);
        // Verifica se o estado esta cadastrado
        $estadoExistente = Estado::where('nome', $request->nome)
            ->where('sigla', $request->sigla)
            ->first();

        if ($estadoExistente) {
            return redirect()->back()
                ->withErrors(['nome' => "{$request->nome} -  Estado já está cadastrado."])
                ->withInput();
        }


        $estado->update([
            'nome' => $request->nome,
            'sigla' => $request->sigla,
        ]);


        return redirect()->route('estado.listar')->with('success', 'Estado atualizado com sucesso.');
    }

    public function excluir($id)
    {
        $estado = Estado::findOrFail($id);
        $estado->delete();

        return response()->json(['success' => true]);
    }
}

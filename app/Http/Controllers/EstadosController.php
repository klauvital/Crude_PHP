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

        Estado::create($request->only('nome', 'sigla'));

        return redirect()->route('estado.listar')->with('success', 'Estado cadastrado com sucesso!');
    }

    public function listar()
    {
        $estados = Estado::all();
        return view('estado.listar', compact('estados'));
    }

    public function update(Request $request, Estado $estado)
    {
        $estado->update($request->all());
        return $estado;
    }

    public function destroy(Estado $estado)
    {
        $estado->delete();
        return response()->noContent();
    }
}

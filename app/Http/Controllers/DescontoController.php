<?php

namespace App\Http\Controllers;

use App\Models\Desconto;
use App\Models\Campanha;
use Illuminate\Http\Request;

class DescontoController extends Controller
{
    public function index()
    {
        $campanha_nome = Campanha::orderBy('nome_campanha')->get();
        $descontos = Desconto::with('campanha')->orderBy('id', 'desc')->get();
        return view('desconto.listar', [
            'descontos' => $descontos,
            'campanha_nome' => $campanha_nome,
        ]);
    }
    public function create()
    {
        $campanhas = Campanha::orderBy('nome_campanha')->get();

        return view('desconto.inserir', compact('campanhas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'campanha_id' => 'nullable|exists:campanhas,id',
            'valor_total' => 'nullable|numeric|min:0',
            'percentual_desconto' => 'nullable|numeric|min:0|max:100',
        ]);

        $valorDesconto = ($request->percentual_desconto / 100) * $request->valor_total;
        $valorLiquido = $request->valor_total - $valorDesconto;

        Desconto::create([
            'campanha_id' => $request->campanha_id,
            'valor_total' => $request->valor_total,
            'valor_desconto' => $valorDesconto,
            'percentual_desconto' => $request->percentual_desconto,
            'valor_liquido' => $valorLiquido,
        ]);

        return redirect()->route('desconto.listar')->with('success', 'Desconto criado com sucesso.');
    }

    public function edit($id)
    {
        $campanhas = Campanha::orderBy('nome_campanha')->get();
        $desconto = Desconto::findOrFail($id);

        return view('desconto.editar', [
            'desconto' => $desconto,
            'campanhas' => $campanhas,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'campanha_id' => 'nullable|exists:campanhas,id',
            'valor_total' => 'nullable|numeric|min:0',
            'percentual_desconto' => 'nullable|numeric|min:0|max:100',
        ]);

        $valorDesconto = ($request->percentual_desconto / 100) * $request->valor_total;
        $valorLiquido = $request->valor_total - $valorDesconto;

        $desconto = Desconto::findOrFail($id);
        $desconto->update([
            'campanha_id' => $request->campanha_id, // corrigido aqui
            'valor_total' => $request->valor_total,
            'valor_desconto' => $valorDesconto,
            'percentual_desconto' => $request->percentual_desconto,
            'valor_liquido' => $valorLiquido,
        ]);

        return redirect()->route('desconto.listar')->with('success', 'Desconto atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $desconto = Desconto::findOrFail($id);
        $desconto->delete();

        return redirect()->route('desconto.listar')->with('success', 'Desconto excluído com sucesso.');
    }
}

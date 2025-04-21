<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $usuario = 'Claudia Hernandez';
        $perfil = 'Desenvolvedor Backend';
        $area = 'Desenvolvimento de Software (Web)';
        $empresa = 'CRIAR';
        $data = date('d/m/Y H:i:s');

        $dados = [
            'usuario' => $usuario,
            'perfil' =>  $perfil,
            'area' => $area,
            'empresa' => $empresa,
            'data' => $data
        ];

        


        return view('home', $dados);
    }
}

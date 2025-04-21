<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class GruposController extends Controller
{
    public function listar_grupos()
    {
        return view('listar_grupos');
    }
    
}

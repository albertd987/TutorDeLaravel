<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function mostrar($nombre)
    {
        return view('perfil',[
            'nombre'=>$nombre,
            'ciudad'=>'Barcelona'
        ]);

    }
}

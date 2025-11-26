<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function show($id){
        $pais=Pais::with('ciudades')->findOrFail($id);
        
        return view('paises.show',['pais'=>$pais]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    public function mostrar($ciudad){
        return view('ciudad',[
            'ciudad'=>ucfirst($ciudad)
        ]);
    }
 
    public function index()
    {
        $ciudades = Ciudad::all(); //això equival a un "select * from ciudad;"

        return view('ciudades.index',[
            'ciudades'=>$ciudades
        ]);
        
    }

    public function create(){
        return view('ciudades.create');
    }

    public function store(Request $request){

        //validar dades
        $request->validate([
            'nombre'=>'required|max:255',
            'pais'=>'required|max:255',
            'poblacion'=>'nullable|integer|min:0'
        ]);

        //crear la ciutat
        Ciudad::create([
            'nombre'=>$request->nombre,
            'pais'=>$request->pais,
            'poblacion'=>$request->poblacion
        ]);

        return redirect('/ciudades')->with('success','Ciudad creada correctamente');

    }
}

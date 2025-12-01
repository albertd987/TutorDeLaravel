<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    public function mostrar($ciudad)
    {
        return view('ciudad', [
            'ciudad' => ucfirst($ciudad)
        ]);
    }

    public function index()
    {
        $ciudades = Ciudad::all(); //això equival a un "select * from ciudad;"

        return view('ciudades.index', [
            'ciudades' => $ciudades
        ]);
    }

    public function create()
    {
        $paises= \App\Models\Pais::all();
        return view('ciudades.create',['paises'=>$paises]);
    }

    public function store(Request $request)
    {

        //validar dades
        $request->validate([
            'nombre' => 'required|max:255',
            'pais_id' => 'required|exists:pais,id',
            'poblacion' => 'nullable|integer|min:0'
        ]);

        //crear la ciutat
        Ciudad::create([
            'nombre' => $request->nombre,
            'pais_id' => $request->pais_id,
            'poblacion' => $request->poblacion
        ]);

        return redirect('/ciudades')->with('success', 'Ciudad creada correctamente');
    }

    //mostrar formulari d'edició
    public function edit($id)
    {
        $ciudad = Ciudad::findOrFail($id);
        $paises=\App\Models\Pais::all();
        return view('ciudades.edit', [
            'ciudad' => $ciudad,
            'paises'=>$paises
        ]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nombre' => 'required|max:255',
            'pais_id' => 'required|exists:pais,id',
            'poblacion' => 'nullable|integer|min:0'
        ]);
        $ciudad = Ciudad::findOrFail($id);

        $ciudad->nombre = $request->nombre;
        $ciudad->pais_id = $request->pais_id;
        $ciudad->poblacion = $request->poblacion;
        $ciudad->save();

        return redirect('/ciudades')->with('success', 'Ciudad actualizada correctamente');
    }

    public function destroy($id){
        $ciudad=Ciudad::findOrFail($id);
        $ciudad->delete(); //tmb pots fer Ciudad::destroy($ciudad);
        return redirect('/ciudades')->with('success','Ciudad eliminada correctamente');
    }
    public function eliminar($id) //funció de prova x veure href i xq no és segur
{
    $ciudad = Ciudad::findOrFail($id);
    $ciudad->delete();
    
    return redirect('/ciudades')->with('success', 'Ciudad eliminada correctamente');
}
}
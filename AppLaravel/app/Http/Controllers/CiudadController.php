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
        return view('ciudades.create');
    }

    public function store(Request $request)
    {

        //validar dades
        $request->validate([
            'nombre' => 'required|max:255',
            'pais' => 'required|max:255',
            'poblacion' => 'nullable|integer|min:0'
        ]);

        //crear la ciutat
        Ciudad::create([
            'nombre' => $request->nombre,
            'pais' => $request->pais,
            'poblacion' => $request->poblacion
        ]);

        return redirect('/ciudades')->with('success', 'Ciudad creada correctamente');
    }

    //mostrar formulari d'edició
    public function edit($id)
    {
        $ciudad = Ciudad::findOrFail($id);
        return view('ciudades.edit', [
            'ciudad' => $ciudad
        ]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nombre' => 'required|max:255',
            'pais' => 'required|max:255',
            'poblacion' => 'nullable|integer|min:0'
        ]);
        $ciudad = Ciudad::findOrFail($id);

        $ciudad->nombre = $request->nombre;
        $ciudad->pais = $request->pais;
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
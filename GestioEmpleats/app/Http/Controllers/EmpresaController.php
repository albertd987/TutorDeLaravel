<?php

namespace App\Http\Controllers;

use App\Models\DepartamentModel;
use App\Models\EmpleatModel;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function empleats(){
        $empleats=EmpleatModel::with('departament')->get();
        $departaments=DepartamentModel::all();

        return view('empleats',[
            'empleats'=>$empleats,
            'departaments'=>$departaments
        ]);
    }
    

    public function guardarEmpleat(Request $request){
        $request->validate([
            'nom'=>'required|max:255',
            'dpt_id'=>'required|exists:departament,id' //que putes vol dir aquesta línia
        ]);

        EmpleatModel::create([
            'nom'=>$request->nom,
            'dpt_id'=>$request->dpt_id
        ]);

        return redirect('/empleats')->with('success','Empleat creat correctament');
    }

    public function eliminarEmpleat($id){
        $empleat=EmpleatModel::findOrFail($id);
        $empleat->delete();

        return redirect('/empleats')->with('success','Empleat eliminat correctament');

    }
}


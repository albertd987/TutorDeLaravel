<?php

namespace App\Http\Controllers;

use App\Models\DepartamentModel;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function show(){
        $departaments=DepartamentModel::all();

        return view('departaments.show',[
            'departaments'=>$departaments
        ]);

    }

}
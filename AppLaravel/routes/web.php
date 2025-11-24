<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\PerfilController;

//versió cutre sense controlador
Route::get('/hola', function(){
    return view ('saludo',[
        'nombre'=> 'Albert',
        'edad' =>25
    ]);
});

//versio amb controlador, a partir d'ara totes així x bones pràctiques
Route::get('/perfil/{nombre}',[PerfilController::class,'mostrar']);
Route::get('/ciudad/{ciudad}',[CiudadController::class,'mostrar'])
->where('ciudad','[A-Za-z]+'); //expressió regular x a que el parametre ciutat nms pugui tenir lletres
Route::get('/ciudades',[CiudadController::class,'index']);
//Mostrar formulari de creacio
Route::get('ciudades/crear',[CiudadController::class,'create']);
Route::post('/ciudades',[CiudadController::class,'store']);

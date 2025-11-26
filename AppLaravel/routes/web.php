<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\PerfilController;

//versió cutre sense controlador
Route::get('/hola', function(){
    return view ('saludo',[
        'nombre'=> 'Albert',
        'edad' =>25
    ]);
});
// Rutes de perfil
Route::get('/perfil/{nombre}', [PerfilController::class, 'mostrar']);

// CRUD de ciudats (ordre important)
Route::get('/ciudades', [CiudadController::class, 'index']);              // Llistar
Route::get('/ciudades/crear', [CiudadController::class, 'create']);       // Mostrar formulari
Route::post('/ciudades', [CiudadController::class, 'store']);             // Guardar
Route::get('/ciudades/{id}/editar', [CiudadController::class, 'edit']);   // Mostrar formulari edició
Route::put('/ciudades/{id}', [CiudadController::class, 'update']);        // Actualitzar
Route::delete('/ciudades/{id}', [CiudadController::class, 'destroy']);    // Eliminar (DELETE)

// Ruta alternativa GET per a eliminar (nms aprenentatge ja que no és segura per la falta de token @csrf)
Route::get('/ciudades/{id}/eliminar', [CiudadController::class, 'eliminar']);

// Ruta individual de ciutat (al final per a evitar conflictes)
Route::get('/ciudad/{ciudad}', [CiudadController::class, 'mostrar'])
    ->where('ciudad', '[A-Za-z]+');

Route::get('/paises/{id}',[PaisController::class,'show']);
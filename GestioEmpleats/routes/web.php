<?php

use App\Http\Controllers\EmpresaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/empleats',[EmpresaController::class,'empleats']);
Route::post('/empleats',[EmpresaController::class,'guardarEmpleat']);
Route::delete('/empleats/{id}/eliminar',[EmpresaController::class,'eliminarEmpleat']);

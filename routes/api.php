<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\CargoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/empleados',[EmpleadoController::class,'index']);
Route::post('/empleados',[EmpleadoController::class,'store']);

Route::get('/cargos',[CargoController::class,'index']);
Route::post('/cargos',[CargoController::class,'store']);
Route::put('/cargos/{cargo}',[CargoController::class,'update']);
Route::delete('/cargos/{cargo}',[CargoController::class,'destroy']);

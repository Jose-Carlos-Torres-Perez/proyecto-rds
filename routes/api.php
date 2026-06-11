<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\FuncionesCargoController;
use App\Http\Controllers\UserController;

Route::middleware('auth:sanctum')->group(function(){
Route::get('/user',  function (Request $request) {
    return $request->user();
});
Route::get('/empleados',[EmpleadoController::class,'index']);
Route::post('/empleados',[EmpleadoController::class,'store']);
Route::put('/empleados/{empleado}',[EmpleadoController::class,'update']);
Route::delete('/empleados/{empleado}',[EmpleadoController::class,'destroy']);

Route::get('/cargos',[CargoController::class,'index']);
Route::post('/cargos',[CargoController::class,'store']);
Route::put('/cargos/{cargo}',[CargoController::class,'update']);
Route::delete('/cargos/{cargo}',[CargoController::class,'destroy']);

Route::get('/funcionescargos',[FuncionesCargoController::class,'index']);
Route::post('/funcionescargos',[FuncionesCargoController::class,'store']);
Route::put('/funcionescargos/{funcionescargo}',[FuncionesCargoController::class,'update']);
Route::delete('/funcionescargos/{funcionescargo}',[FuncionesCargoController::class,'destroy']);



});
Route::post('/users',[UserController::class,'store']);
Route::post('/sesion',[UserController::class,'login']);
Route::get('/detalleempleado/{empleado}',[EmpleadoController::class,'detalleempleado']);

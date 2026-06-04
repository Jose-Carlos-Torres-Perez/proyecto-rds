<?php

namespace App\Http\Controllers;

use App\Models\FuncionesCargo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function Pest\Laravel\json;

class FuncionesCargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funciones = FuncionesCargo::all();
        if($funciones->isEmpty()){
            return response()->json(['message'=>'no hay funciones disponibles'],200);
        }
        return response()->json([$funciones,200]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $validator=Validator::make($request->all(),[
        'cargo_id'=>'required',
        'descripcion_funcion'=>'required',
        'estado'=>'required'
     ]);
     if($validator->fails()){
        $data=[
            'message'=>'error en la validacion de datos',
            'errors'=>$validator->errors(),
            'status'=>'400'
        ];
        return response()->json([$data,400]);
     }
     $funciones= FuncionesCargo::create([
        'cargo_id'=>$request->cargo_id,
        'descripcion_funcion'=>$request->descripcion_funcion,
        'estado'=>$request->estado
     ]);
     if (!$funciones) {
        $data=['message'=>'error al crear una funcion','status',500];
        
        return response()->json($data,500);
     }  
     $data=['funciones'=>$funciones,'status',201];
     return response()->json($data,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(FuncionesCargo $funcionesCargo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FuncionesCargo $funcionesCargo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FuncionesCargo $funciones)
    {
      $validator=Validator::make($request->all(),[
        'cargo_id'=>'required',
        'descripcion_funcion'=>'required',
        'estado'=>'required'
     ]);
     if($validator->fails()){
        $data=[
            'message'=>'error en la validacion de datos',
            'errors'=>$validator->errors(),
            'status'=>'400'
        ];
        return response()->json([$data,400]);
     }
     $funciones->update([
        'cargo_id'=>$request->cargo_id,
        'descripcion_funcion'=>$request->descripcion_funcion,
        'estado'=>$request->estado
     ]);
     if (!$funciones) {
        $data=['message'=>'error al crear una funcion','status',500];
        
        return response()->json($data,500);
     }  
     $data=['funciones'=>$funciones,'status',201];
     return response()->json($data,201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FuncionesCargo $funciones)
    {
    $funciones->delete();
    return response()->json(['message'=>'eliminado con exito'],200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Empleado;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $empleados=Empleado::all();

       return response()->json($empleados,200);
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
       $validator=validator::make($request->all(),[
        'nombres'=>'required',
        'apellidos'=>'required',
        'fecha_nacimiento'=>'required',
        'fecha_ingreso'=>'required',
        'salario'=>'required',
        'estado'=>'required'

       ]);
       if($validator->fails()){
        $data=[
            'message'=>'error en la validacion de los datos',
            'errors'=>$validator->errors(),
            'estatus'=>'400'
        ];
        return response()->json($data,400);
       }
       $empleado=Empleado::create([
        'nombres'=>$request->nombres,
        'apellidos'=>$request->apellidos,
        'fecha_nacimiento'=>$request->fecha_nacimiento,
        'fecha_ingreso'=>$request->fecha_ingreso,
        'salario'=>$request->salario,
        'estado'=>$request->estado
       ]);
       if(!$empleado){
        $data=[
        'message'=>'erro al crear un empleado',
        'status'=>500
        ];
        return response()->json($data,500);
       }
       $data=[
        'empleado'=>$empleado,
        'status'=>201
       ];
       return response()->json($data,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}

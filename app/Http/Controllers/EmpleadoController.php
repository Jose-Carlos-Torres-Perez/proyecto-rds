<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Empleado;
use App\Models\FuncionesCargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function detalleempleado( Empleado $empleado){

   $cargo= Cargo::where('id',$empleado['cargo_id'])->first();

   $funciones=FuncionesCargo::where('cargo_id',$empleado['cargo_id'])->get();
   $contenedor="";
   foreach ($funciones as $funcion) {
    $contenedor=$contenedor.",".$funcion['descripcion_funcion'];
   }
   

   $datos=['nombre_empleado'=>$empleado['nombres'],'cargo_asignado'=>$cargo['nombre_cargo'],'salario'=>$empleado['salario'],'funciones_cargo'=>$contenedor];
    return response()->json($datos);
    
  

    //return response()->json($empleado);
    }
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
        'cargo_id'=>'required',
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
            'status'=>'400'
        ];
        return response()->json($data,400);
       }
       $empleado=Empleado::create([
        'cargo_id'=>$request->cargo_id,
        'nombres'=>$request->nombres,
        'apellidos'=>$request->apellidos,
        'fecha_nacimiento'=>$request->fecha_nacimiento,
        'fecha_ingreso'=>$request->fecha_ingreso,
        'salario'=>$request->salario,
        'estado'=>$request->estado
       ]);
       if(!$empleado){
        $data=[
        'message'=>'error al crear un empleado',
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
          $validator=validator::make($request->all(),[
        'cargo_id'=>'required',
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
       $empleado->update([
        'cargo_id'=>$request->cargo_id,
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
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return response()->json(['message'=>'eliminado con exito',200]);
    }
}

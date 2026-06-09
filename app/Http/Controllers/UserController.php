<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        
        $credenciales=[
            'email'=>$request->email,
            'password'=>$request->password
        ];
        if(Auth::attempt($credenciales)){
            $token = Auth::user()->createToken('llave')->plainTextToken;
            return response()->json($token);
        }
    }
    public function index()
    {
        //
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
    'name'=>'required',
    'email'=>'required',
    'password'=>'required'
    ]);
    if($validator->fails()){

        $data=[
            'message'=>'los datos esperado sion incorrectos',
            'errors'=>$validator->errors(),
        ];
        return response()->json($data,400);
    }
    $user=User::create([
    'name'=>$request->name,
    'email'=>$request->email,
    'password'=>$request->password
    ]);
    if(!$user){

    $data=[
        'message'=>'el usuario no fue registrado',
        'status'=>'500'
    ];
    return response()->json($data,500);
    }
    $data=[
        'user'=>$user,
        'status'=>201
        ];
    return response()->json($data,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}

<?php

use App\Models\Cargo;
use App\Models\Empleado;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;

uses(RefreshDatabase::class);

test('puede crear un empleado', function () {
    $user=User::factory()->create();
    Sanctum::actingAs($user);
   $cargo = \App\Models\Cargo::factory()->create();

    $datos = \App\Models\Empleado::factory()
        ->make([
            'cargo_id' => $cargo->id
        ])
        ->toArray();

    $respuesta = $this->postJson('/api/empleados', $datos);

    $respuesta->assertStatus(201);

    $this->assertDatabaseHas('empleados', [
        'nombres' => $datos['nombres'],
        'apellidos' => $datos['apellidos'],
        'cargo_id' => $cargo->id
    ]);
    
});
test('puede ver los empleados ', function () {
     $user=User::factory()->create();
    Sanctum::actingAs($user);
   $cargo = \App\Models\Cargo::factory()->create();

    $datos = \App\Models\Empleado::factory()
        ->make([
            'cargo_id' => $cargo->id
        ])
        ->toArray();
    
    $respuesta = $this->getJson('/api/empleados');
    $respuesta->assertStatus(200);
    


}); 


test('puede actualizar un empleado', function () {
    $user=User::factory()->create();
    Sanctum::actingAs($user);

   $cargo= \App\Models\Cargo::factory()->create();

    $datos = \App\Models\Empleado::factory()
        ->create([
            'cargo_id' => $cargo->id
        ]);
    $empleado=[
        'cargo_id'=>$cargo->id,
        'nombres'=>'juan andres',
        'apellidos'=>'torres perez',
        'fecha_nacimiento'=>'1999-12-12',
        'fecha_ingreso'=>'2026-05-01',
        'salario'=>'25000',
        'estado'=>'activo'
        ];
     $respuesta = $this->putJson(
        "/api/empleados/{$datos->id}",
        $empleado);
        $respuesta->assertStatus(201);
    
});

test('puede eliminar un empleado', function () {
    $user=User::factory()->create();
    Sanctum::actingAs($user);
    
   $cargo= \App\Models\Cargo::factory()->create();

    $datos = \App\Models\Empleado::factory()
        ->create([
            'cargo_id' => $cargo->id
        ]);
    
     $respuesta = $this->deleteJson(
        "/api/empleados/{$datos->id}");

        $respuesta->assertStatus(200);
    
});
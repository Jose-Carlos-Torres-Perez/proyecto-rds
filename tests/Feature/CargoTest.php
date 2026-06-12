<?php

use App\Models\Cargo;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\RefreshDatabase;
uses(RefreshDatabase::class);
test('puede crear un cargo', function () {
    $user=User::factory()->create();
    Sanctum::actingAs($user);

    $cargo=Cargo::factory()->create();

    $this->assertDatabaseHas('cargos',['nombre_cargo'=>$cargo['nombre_cargo'],
    'descripcion'=>$cargo['descripcion']]);
    
});
test('lista todos los cargos',function(){
$user=User::factory()->create();
Sanctum::actingAs($user);
 $cargo=Cargo::factory()->create();

    $this->assertDatabaseHas('cargos',['nombre_cargo'=>$cargo['nombre_cargo'],
    'descripcion'=>$cargo['descripcion']]);

$respuesta= $this->getJson('/api/cargos');
$respuesta->assertStatus(200);

});

test('actualiza un cargo',function(){

$user=User::factory()->create();
Sanctum::actingAs($user);
$cargo=Cargo::factory()->create();

$cargos=[
    'nombre_cargo'=>'recursos humanos',
    'descripcion'=>'realiza entrevistas al personal que va ingresar'
];

$respuesta=$this->putJson("/api/cargos/{$cargo->id}",$cargos);
$respuesta->assertStatus(201);
});
test('elimina un cargo',function(){
    $user=User::factory()->create();
    Sanctum::actingAs($user);
    $cargo=Cargo::factory()->create();
    $respuesta=$this->deleteJson("/api/cargos/{$cargo->id}");
    $respuesta->assertStatus(200);
});
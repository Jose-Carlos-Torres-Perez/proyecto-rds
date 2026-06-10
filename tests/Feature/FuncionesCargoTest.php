<?php

use App\Models\Cargo;
use App\Models\FuncionesCargo;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\RefreshDatabase;
uses(RefreshDatabase::class);

test('crea una funcion para los cargos' , function () {
    $user=User::factory()->create();
    Sanctum::actingAs($user);
    $cargo=Cargo::factory()->create();
    $datos=FuncionesCargo::factory()->make(['cargo_id'=>$cargo->id])->toArray();
    $respuesta=$this->postJson('/api/funcionescargos',$datos);
    $respuesta->assertStatus(201);
    $this->assertDatabaseHas('funciones_cargos',[
        'cargo_id'=>$cargo->id,
        'descripcion_funcion'=>$datos['descripcion_funcion'],
        'estado'=>$datos['estado']
    ]);
   
});

test('muestra todas la funciones de los cargos ',function(){
    $user=User::factory()->create();
    Sanctum::actingAs($user);
    $respuesta=$this->postJson('/api/funcionescargos');
    $respuesta->assertStatus(200);

});

test('puede eliminar una funcion',function(){
$user=User::factory()->create();
Sanctum::actingAs($user);
$cargo=Cargo::factory()->create();
$datos=FuncionesCargo::factory()->create(['cargo_id'=>$cargo->id]);
$respuesta=$this->deleteJson("/api/funcionescargos/{$datos->id}");
$respuesta->assertStatus(200);
});
test('actualiza una funcion de cargo',function(){
$user=User::factory()->create();
Sanctum::actingAs($user);
$cargo=Cargo::factory()->create();
$datos=FuncionesCargo::factory()->create(['cargo_id'=>$cargo->id]);

$update_funsiones=[
    'cargo_id'=>$datos->id,
    'descripcion_funcion'=>'realiza xxxxx',
    'estado'=>'activo'
];
$respuesta=$this->putJson("/api/funcionescargos/{$cargo->id}",$update_funsiones);
$respuesta->assertStatus(201);

});
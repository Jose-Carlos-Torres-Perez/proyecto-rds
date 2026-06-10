<?php
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
uses (RefreshDatabase::class);
test('puede crear un usuario', function () {
    
    $user=User::factory()->create();
    $this->assertDatabaseHas('users',[
        'name'=>$user['name'],
        'email'=>$user['email'],
        'email_verified_at'=>$user['email_verified_at'],
        'password'=>$user['password'],
        'remember_token'=>$user['remember_token']
    ]);
});

test('puede iniciar sesion', function () {
    
    $user=User::factory()->create();
    $this->assertDatabaseHas('users',[
        'email'=>$user['email'],
        'password'=>$user['password']
    ]);
    
});

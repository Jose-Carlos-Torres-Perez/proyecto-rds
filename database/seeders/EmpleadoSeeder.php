<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Cargo::factory(3)->create();
        \App\Models\FuncionesCargo::factory(9)->create();
       \App\Models\Empleado::factory(12)->create();
    }
}

<?php

namespace Database\Factories;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
    'cargo_id'=>$this->faker->numberBetween(1,3),
    'nombres'=>$this->faker->firstNameMale(),
    'apellidos'=>$this->faker->lastName(),
    'fecha_nacimiento'=>$this->faker->dateTimeBetween('1994-01-01','2000-12-31')->format('Y-m-d'),
    'fecha_ingreso'=>$this->faker->dateTimeBetween('2024-01-01','2025-12-31')->format('Y-m-d'),
    'salario'=>$this->faker->numberBetween(25000,30000),
    'estado'=>$this->faker->randomElement(['activo','inactivo'])
        ];
    }
}

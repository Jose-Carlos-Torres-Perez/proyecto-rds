<?php

namespace Database\Factories;

use App\Models\FuncionesCargo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FuncionesCargo>
 */
class FuncionesCargoFactory extends Factory
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
        'descripcion_funcion'=>$this->faker->sentence(),
        'estado'=>$this->faker->randomElement(['activo','inactivo'])
        ];
    }
}

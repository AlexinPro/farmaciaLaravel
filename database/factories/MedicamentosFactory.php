<?php

namespace Database\Factories;

use App\Models\Laboratorio;
use App\Models\Laboratorios;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicamentos>
 */
class MedicamentosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'descripcion' => $this->faker->sentence(),
            'precio' => $this->faker->randomFloat(2, 1, 100),
            'caducidad' => $this->faker->date(),
            'lote' => $this->faker->randomNumber(),
            'porcion' => $this->faker->randomElement(),
            'image' => '',
            'id_laboratorio' => Laboratorios::inRandomOrder()->first()->id, // Asignar un laboratorio existente
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

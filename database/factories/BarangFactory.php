<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => null,
            'nama' => $this->faker->word(),
            'stok' => $this->faker->numberBetween(10, 500),
            'tipe' => $this->faker->randomElement(['Laptop', 'Smartphone', 'Tablet', 'Headphone', 'Monitor', 'Keyboard', 'Mouse', 'Printer', 'Speaker', 'Power Bank']),
        ];
    }
}

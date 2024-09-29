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
            'nama' => $this->faker->sentence(mt_rand(1, 2)),
            'user_id' => mt_rand(1, 3),
            'category_id' => mt_rand(1, 3),
            'slug' => $this->faker->slug(),
            'harga' => $this->faker->randomFloat(2, 10, 1000),
            'excerpt' => $this->faker->sentence(mt_rand(5, 10)),
            'body' => $this->faker->sentence(mt_rand(25, 40)),
            'stok' => mt_rand(1, 20),

        ];
    }
}
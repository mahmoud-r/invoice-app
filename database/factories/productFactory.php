<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name(),
            'price' => $this->faker->randomNumber('5'),
            'Quantity' => $this->faker->randomNumber('2'),
            'categorie_id' => $this->faker->numberBetween('1','10'),
        ];
    }
}

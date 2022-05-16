<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\invoice>
 */
class invoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'invoices_date' => $this->faker->date(),
            'invoices_number' => $this->faker->randomNumber('5'),
            'categorie_id' => $this->faker->numberBetween('1','4'),
            'product_id' => $this->faker->numberBetween('1','50'),
            'disconunt' => $this->faker->randomNumber('3'),
            'price' => $this->faker->randomNumber('3'),
            'total' => $this->faker->randomNumber('3'),
            'text_rate' => $this->faker->numberBetween('1','3'),
            'text_value' => $this->faker->randomNumber(3),
//            'notes' => $this->faker->text(),

        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BoxFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomElement([1, 2]),
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'm²' => $this->faker->randomFloat(2, 1, 100),
            'price_per_month' => $this->faker->randomFloat(2, 1, 100),
            'description' => $this->faker->text,
            'available' => $this->faker->boolean,
        ];
    }
}

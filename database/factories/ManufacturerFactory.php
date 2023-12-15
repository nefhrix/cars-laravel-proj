<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manufacturer>
 */
class ManufacturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' =>$this->faker->randomElement([
                 "Volkswagen AG",
            "Toyota Motor Corp",
                "Mercedes Benz",
            "Ford Motor Co",
            "General Motors",
            "Honda Motor Co Ltd"
            ]),
            'phone_no' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
        ];
    }
}

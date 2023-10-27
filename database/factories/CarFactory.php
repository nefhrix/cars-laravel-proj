<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition()
    {
        return [
            'make' => $this->faker->randomElement(['Toyota', 'Honda', 'Ford', 'Chevrolet', 'Nissan']),
            'model' => $this->faker->randomElement(['Corolla', 'Civic', 'F-150', 'Silverado', 'Altima']),
            'year' => $this->faker->numberBetween(2000, 2023),
            'color' => $this->faker->safeColorName,
        ];
    }
}
 

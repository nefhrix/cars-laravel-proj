<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Car;

use Faker\Generator as Faker;

class CarFactory extends Factory
{

    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $this->faker->addProvider(new \Faker\Provider\Fakecar($this->faker));
        $v = $this->faker->vehicleArray();

        return [
            'model' => $v['model'],
            'brand' => $v['brand'],
            'color' => $this->faker->hexColor(),
            'license' => $this->faker->unique()->bothify('#######'),
        ];
    }
    
} 
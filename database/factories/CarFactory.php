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
            'make' => $this->faker->randomElement([
                "Ford",
                "Honda",
                "Chevrolet",
                "Porsche",
                "Ferrari",
                "Lamborghini",
                "McLaren",
                "Aston Martin",
                "Bugatti",
                "Koenigsegg",
                "Lotus",
                "Maserati",
                "Alfa Romeo",
                "Pagani",
                "Bentley",
                "Ford",
                "Porsche",
                "Ferrari",
                "Lamborghini",
                "Koenigsegg",
                "Pagani"
            ]),
            'model' => $this->faker->randomElement([
                "GT",
                "NSX",
                "Corvette",
                " 911",
                "488",
                "Huracan",
                " 720S",
                " Valkyrie",
                " Chiron",
                " Jesko",
                " Evija",
                " MC20",
                " Romeo 4C",
                " Huayra",
                " Continental GT",
                " GT",
                " Taycan",
                " Roma",
                " Aventador",
                " Huayra"
            ]),
            'year' => $this->faker->numberBetween(2009, 2023),
            'color' => $this->faker->safeColorName,
            'car_image' => $this->faker->imageUrl(),
            // CarFactory.php
            'manufacturer_id' => \App\Models\Manufacturer::factory(),

        ];
    }
}
 

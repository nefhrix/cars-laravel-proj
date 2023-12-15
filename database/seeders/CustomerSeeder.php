<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Car;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()
        ->times(3)
        ->create();

        foreach(Car::all() as $car)
        {
            $customers = Customer::inRandomOrder()->take(rand(1,3))->pluck('id');
            $car->customers()->attach($customers);
        }
    }
}

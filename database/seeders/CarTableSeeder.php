<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;

class CarTableSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Car::factory(20)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }

}

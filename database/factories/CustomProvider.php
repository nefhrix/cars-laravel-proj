<?php

// database/factories/CustomCarProvider.php

use Faker\Generator;

class CustomCarProvider extends Generator
{
    public function customData()
    {
        // Implement your custom logic to generate data
        return $this->randomElement(['Option 1', 'Option 2', 'Option 3']);
    }

    // Custom method to generate a fake car with make and model
    public function fakeCar()
    {
        $makes = ['Toyota', 'Honda', 'Ford', 'Chevrolet', 'Nissan'];
        $models = ['Corolla', 'Civic', 'F-150', 'Silverado', 'Altima'];

        return [
            'make' => $this->randomElement($makes),
            'model' => $this->randomElement($models),
            'year' => $this->numberBetween(2000, 2023),
            'color' => $this->safeColorName,
        ];
    }

    // You can add more custom methods as needed
}



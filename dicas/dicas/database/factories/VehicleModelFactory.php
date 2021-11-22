<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $brand = $this->faker->randomElement(Brand::all());

        return [
            'description' => $this->faker->bothify('?##?'),
            'brand_id' => $brand->id,
        ];
    }
}

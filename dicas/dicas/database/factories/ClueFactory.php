<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Clue;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ClueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = $this->faker->randomElement(User::all());
        $type = $this->faker->randomElement(Type::all());
        $brand = $type->brands()->inRandomOrder()->first();//$this->faker->randomElement($type->brands()->get());
        $vehicleModel = $brand->vehicleModels()->inRandomOrder()->first();//$this->faker->randomElement($brand->vehicleModels());
        $version = $vehicleModel->versions()->inRandomOrder()->first();//$this->faker->randomElement($vehicleModel->versions()->get());

        return [
            'description' => $this->faker->realText(200, 2),
            'user_id' => $user->id,
            'type_id' => $type->id,
            'brand_id' => $brand->id,
            'vehicle_model_id' => $vehicleModel->id,
            'version_id' => $version->id
        ];
    }
}

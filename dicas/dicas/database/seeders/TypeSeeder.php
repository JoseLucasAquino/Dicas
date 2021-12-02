<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Type;
use App\Models\VehicleModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::factory()
            ->count(3)
            ->has(Brand::factory()->count(20)->has(VehicleModel::factory()->count(4)->hasVersions(3)))
            ->create();
    }
}

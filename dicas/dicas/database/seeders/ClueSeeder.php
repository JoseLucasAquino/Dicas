<?php

namespace Database\Seeders;

use App\Models\Clue;
use Illuminate\Database\Seeder;

class ClueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clue::factory()
            ->count(30)
            ->create();
    }
}

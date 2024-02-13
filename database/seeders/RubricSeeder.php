<?php

namespace Database\Seeders;

use App\Models\Rubric;
use Illuminate\Database\Seeder;

class RubricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Rubric::count() === 0) {
            Rubric::factory()->count(25)->create();
        }
    }
}

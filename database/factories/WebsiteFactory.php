<?php

namespace Database\Factories;

use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebsiteFactory extends Factory
{
    protected $model = Website::class;

    public function definition(): array
    {
        return [
            'domain' => $this->faker->unique()->randomElement(['superwebsite.com', 'newwebsite.com'])
        ];
    }
}


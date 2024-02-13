<?php

namespace Database\Factories;

use App\Models\Rubric;
use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;

class RubricFactory extends Factory
{
    protected $model = Rubric::class;

    public function definition(): array
    {
        return [
            'slug' => $this->faker->unique()->slug(5),
            'title' => $this->faker->text(5),
            'is_publish' => true,
            'website_id' => $this->faker->randomElement($this->websiteId())
        ];
    }

    public function websiteId(): array
    {
        return Website::all()->pluck('id')->toArray();
    }
}


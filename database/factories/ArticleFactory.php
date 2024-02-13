<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Rubric;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        return [
            'slug' => $this->faker->unique()->slug,
            'title' => $this->faker->text(5),
            'author' => $this->faker->text(5),
            'text' => $this->faker->text(255),
            'is_publish' => true,
            'rubric_id' => $this->faker->randomElement($this->rubricId())
        ];
    }

    public function rubricId(): array
    {
        return Rubric::all()->pluck('id')->toArray();
    }
}


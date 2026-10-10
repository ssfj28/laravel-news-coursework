<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(6),
            'excerpt' => fake()->paragraph(),
            'content' => fake()->paragraphs(5, true),
        ];
    }
}

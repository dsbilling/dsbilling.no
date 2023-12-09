<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(),
            'slug' => Str::slug($this->faker->text()),
            'body' => $this->faker->paragraphs(3, true),
            'draft' => false,
            'published_at' => $this->faker->dateTimeBetween('-1 year', '-1 month'),
            'user_id' => 1,
        ];
    }
}

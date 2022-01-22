<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text,
            'slug' => Str::slug($this->faker->text),
            'body' => $this->faker->paragraphs(3, true),
            'draft' => $this->faker->boolean,
            'published_at' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'user_id' => 1,
        ];
    }
}

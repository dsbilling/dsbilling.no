<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'content' => $this->faker->paragraph,
            'repository' => $this->faker->url,
            'website' => $this->faker->url,
            'logo_url' => $this->faker->imageUrl(),
            'start_date' => $this->faker->dateTimeBetween('-12 years', 'now'),
            'end_date' => null,
            'status' => $this->faker->numberBetween(0, 2),
        ];
    }
}

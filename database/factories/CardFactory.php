<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => Project::inRandomOrder()->first()->id,
            'title' => fake()->name(null),
            'description' => $this->faker->text(),
            'finished' => $this->faker->boolean(),
            'dt_finished' => $this->faker->date(),
            'dt_created' => $this->faker->date(),
        ];
    }
}

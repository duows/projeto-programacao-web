<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=ProjectLog>
 */
class ProjectLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        
        return [
            'user_project_id' => Project::inRandomOrder()->first()->id,
            'type_log' => $this->faker->numberBetween(1, 4),
            'dt_modified' => $this->faker->date(),
        ];
    }
}

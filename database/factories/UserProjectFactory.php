<?php

namespace Database\Factories;

use App\Models\PersonalUser;
use App\Models\Project;
use App\Models\UserProject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=UserProject>
 */
class UserProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /* 'personal_user_id',
        'is_owner',
        'project_id',
        'dt_admission', */

        return [
            'personal_user_id' => PersonalUser::inRandomOrder()->first()->id,
            'is_owner' => $this->faker->boolean(),
            'project_id' => Project::inRandomOrder()->first()->id,
            'dt_admission' => $this->faker->date(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Card;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            /*
            "card_id", "description", "status_task", "weight",
        "dt_start", "dt_end", "dead_line"];
            
            */
        return [
            'card_id' => Card::inRandomOrder()->first()->id,
            'description' => $this->faker->text(),
            //nao iniciada / andamento / atraso / finalizada
            'status_task' => $this->faker->numberBetween(1, 4),
            'weight' => $this->faker->numberBetween(0, 10),
            'dt_start' => $this->faker->date(),
            'dt_end' => $this->faker->date(),
            'dead_line' => $this->faker->text(),
        ];
    }
}

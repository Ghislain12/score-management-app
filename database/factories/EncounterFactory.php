<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enconter>
 */
class EncounterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_team' => 1,
            'second_team' => Team::where('id', '!=', 1)->get()->random()->id,
            'arbitrator' => fake()->name(),
            'start_date' => fake()->dateTimeBetween(startDate: '2023-09-05 14:00:00', endDate: '2023-09-06 16:00:00'),
        ];
    }
}

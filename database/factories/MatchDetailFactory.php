<?php

namespace Database\Factories;

use App\Models\Encounter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MatchDetail>
 */
class MatchDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'encounter_id' => Encounter::all()->random()->id,
            'event' => fake()->text(200),
            'title' => fake()->text(50)
        ];
    }
}

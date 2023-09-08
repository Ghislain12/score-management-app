<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'height' => fake()->numberBetween(int1: 160, int2: 190),
            'post' => fake()->randomElement(['Gardien', 'Attaquant', 'Milieu', 'Défenseur', 'Aillier']),
            'weight' => fake()->numberBetween(60, 90),
            'age' => fake()->numberBetween(20, 40),
            'team_id' => Team::all()->random()->id
        ];
    }
}

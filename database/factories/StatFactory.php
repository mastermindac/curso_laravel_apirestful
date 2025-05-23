<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Player;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stat>
 */
class StatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pts'=> fake()->randomFloat(1, 10, 60),
            'pts_three'=> fake()->randomFloat(1, 10, 60),
            'pts_two'=> fake()->randomFloat(1, 10, 50),
            'pts_one'=> fake()->randomFloat(1, 10, 20),
            'min'=> fake()->randomFloat(1, 0, 30),
            'player_id' => 1
        ];
    }
}

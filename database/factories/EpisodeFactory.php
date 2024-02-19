<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Episode>
 */
class EpisodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->realText(20),
            'when'=>fake()->realText(50),
            'where'=>fake()->realText(50),
            'who'=>fake()->realText(50),
            'what'=>fake()->realText(50),
            'do'=>fake()->realText(50),
            'why'=>fake()->realText(50),
            'how'=>fake()->realText(50),
            'point'=>fake()->realText(50),
            'beginning'=>fake()->realText(100),
            'development'=>fake()->realText(100),
            'turnand'=>fake()->realText(100),
            'conclusion'=>fake()->realText(100),
            'episode'=>fake()->realText(500),
            'user_id'=>\App\Models\User::factory(),
        ];
    }
}

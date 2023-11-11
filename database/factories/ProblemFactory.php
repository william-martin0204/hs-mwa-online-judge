<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Problem>
 */
class ProblemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(5, true),
            'description' => fake()->paragraph(3, true),
            'example_input' => fake()->sentence(8, true),
            'example_output' => fake()->sentence(8, true),
        ];
    }
}

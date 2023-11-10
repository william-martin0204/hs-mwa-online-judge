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
            'tag_id' => fake()->randomElement([1, 2, 3, 4, 5]),
            'title' => fake()->sentence(5, true),
            'description' => fake()->paragraph(3, true),
            'example_input' => fake()->sentence(8, true),
            'example_output' => fake()->sentence(8, true),
            'created_by' => fake()->randomElement([1, 2, 3]),
        ];
    }
}

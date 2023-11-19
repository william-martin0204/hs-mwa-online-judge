<?php

namespace Database\Factories;

use App\Models\Problem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

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
            'title' => fake()->unique()->sentence(5, true),
            'description' => fake()->paragraph(3, true),
            'example_input' => fake()->sentence(8, true),
            'example_output' => fake()->sentence(8, true),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Problem $problem) {

            Storage::disk('cases')->put($problem->id.'.in', fake()->paragraph(3, true));
            Storage::disk('cases')->put($problem->id.'.out', fake()->paragraph(3, true));
        });
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Submission>
 */
class SubmissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'problem_id' => $this->faker->numberBetween(1, 10),
            'code' => "
#include <iostream>
using namespace std;

int main() {
    cout << \"Hello World!\\n\";
    return 0;
}
",
            'language' => $this->faker->randomElement(['C++', 'Python', 'Javascript']),
            'status' => $this->faker->randomElement([
                'Accepted',
                'Wrong Answer',
                'Time Limit Exceeded',
                'Compilation Error',
                'Runtime Error',
                'Memory Limit Exceeded',
            ]),
        ];
    }
}

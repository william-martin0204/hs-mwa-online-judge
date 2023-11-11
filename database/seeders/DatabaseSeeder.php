<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        $problems = \App\Models\Problem::factory(10)->create();
        \App\Models\Submission::factory(150)->create();
        $tags = \App\Models\Tag::factory(5)->create();

        foreach ($problems as $problem) {
            $problem->tags()->attach($tags->random(rand(1, 3))->pluck('id')->toArray());
        }
    }
}

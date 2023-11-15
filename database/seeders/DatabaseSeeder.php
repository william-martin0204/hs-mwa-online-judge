<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Problem;
use App\Models\Submission;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        $problems = Problem::factory(10)->create();
        Submission::factory(100)->create();
        $tags = Tag::factory(5)->create();

        foreach ($problems as $problem) {
            $problem->tags()->attach($tags->random(rand(1, 3))->pluck('id')->toArray());
        }

        User::create([
            'name' => 'Fernando',
            'email' => 'fvaldes0109@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);
    }
}

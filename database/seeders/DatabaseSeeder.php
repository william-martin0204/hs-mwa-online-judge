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
        User::create([
            'name' => 'Fernando',
            'email' => 'fvaldes0109@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);
        User::factory(50)->create();

        $problems = Problem::factory(100)->create();
        Submission::factory(600)->create();
        $tags = Tag::factory(10)->create();

        foreach ($problems as $problem) {
            $problem->tags()->attach($tags->random(rand(1, 3))->pluck('id')->toArray());
        }
    }
}

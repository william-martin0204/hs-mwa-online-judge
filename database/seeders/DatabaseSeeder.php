<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Problem::factory(10)->create();

        // Create 2 languages: C++ and Python. Only the name is used.
        DB::table('languages')->insert([
            ['name' => 'C++', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Python', 'created_at' => now(), 'updated_at' => now()],
        ]);

        \App\Models\Submission::factory(50)->create();

    }
}

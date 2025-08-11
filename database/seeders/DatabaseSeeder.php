<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\UserProject;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProjectSeeder::class,
            PersonalUserSeeder::class,
            UserProjectSeeder::class,
            ProjectLogSeeder::class,
            CardSeeder::class,
            TaskSeeder::class,
        ]);
    }
}

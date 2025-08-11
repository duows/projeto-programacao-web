<?php

namespace Database\Seeders;

use App\Models\PersonalUser;
use Illuminate\Database\Seeder;

class PersonalUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PersonalUser::factory(50)->create();
    }
}

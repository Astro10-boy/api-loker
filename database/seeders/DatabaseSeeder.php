<?php

namespace Database\Seeders;

use App\Models\Users;
use App\Models\Lokers;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Lokers::factory()->count(5)->create();
    }
}

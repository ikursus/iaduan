<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil semua fail seeder yang berkaitan
        $this->call([
            UserSeeder::class,
            JenisAduanSeeder::class,
            StatusAduanSeeder::class
        ]);
    }
}

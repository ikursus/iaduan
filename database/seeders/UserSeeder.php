<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cara 1 menyimpan data ke dalam table
        // Query Builder
        DB::table('users')->insert([
            'name' => 'User 1',
            'email' => 'user1@localhost.com',
            'password' => bcrypt('pass123'),
            'phone' => '081234567890',
        ]);

        DB::table('users')->insert([
            'name' => 'User 2',
            'email' => 'user2@localhost.com',
            'password' => bcrypt('pass123'),
            'phone' => '081234567890',
        ]);

        DB::table('users')->insert([
            'name' => 'User 3',
            'email' => 'user3@localhost.com',
            'password' => bcrypt('pass123'),
            'phone' => '081234567890',
        ]);
    }
}

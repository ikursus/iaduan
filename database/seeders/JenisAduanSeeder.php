<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisAduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_aduan')->insert([
            ['nama' => 'Pokok'],
            ['nama' => 'Jalan'],
            ['nama' => 'Sampah'],
            ['nama' => 'Longkang'],
            ['nama' => 'Lain-lain']
        ]);
    }
}


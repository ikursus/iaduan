<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusAduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status_aduan')->insert([
            ['nama' => 'Pending'],
            ['nama' => 'Dalam Proses'],
            ['nama' => 'Dalam Tindakan'],
            ['nama' => 'Selesai'],
            ['nama' => 'Ditolak']
        ]);
    }
}

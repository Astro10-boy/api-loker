<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class LokersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lokers')->insert([
            'id' => 1,
            'nomor_loker' => 'Loker 1',
            'status' => 'digunakan',
            'created_at' => Carbon::parse('2025-06-08T07:59:11.000000Z'),
            'updated_at' => Carbon::parse('2025-06-08T07:59:11.000000Z'),
        ]);
    }
}

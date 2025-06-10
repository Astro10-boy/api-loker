<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PentipanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penitipan')->insert([
            'id' => 1,
            'nama' => 'Budaaai',
            'rfid' => '1234567890',
            'loker_id' => 1,
            'waktu_mulai' => '2025-06-09 14:30:00',
            'waktu_selesai' => '2025-06-09 15:45:00',
            'durasi_menit' => 75,
            'biaya' => 5000,
            'created_at' => Carbon::parse('2025-06-09T08:54:26.000000Z'),
            'updated_at' => Carbon::parse('2025-06-09T08:54:26.000000Z'),
        ]);
    }
}

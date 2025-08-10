<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TahunAjaranSeeder extends Seeder
{
    public function run()
    {
        $dataThn = [
            [
                'tahun_awal' => '2025',
                'tahun_akhir' => '2026',
                'ket' => '2025/2026',
            ],
            [
                'tahun_awal' => '2026',
                'tahun_akhir' => '2027',
                'ket' => '2026/2027',
            ],
        ];

        foreach ($dataThn as $ta) {
            DB::table('tahun_ajarans')->insert([
                'tahun_awal' => $ta['tahun_awal'],
                'tahun_akhir' => $ta['tahun_akhir'],
                'ket' => $ta['ket'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

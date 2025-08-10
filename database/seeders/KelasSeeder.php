<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KelasSeeder extends Seeder
{
    public function run()
    {
        $dataKelas = [
            // Block 1
            [
                'nama_kelas' => 'A',
                'tahun_ajaran_id' => '1',
                'wali_kelas_id' => '1',
                'ket' => 'Kelompok Umur 4 sampai dengan < 5 Tahun',
            ],
            [
                'nama_kelas' => 'B',
                'tahun_ajaran_id' => '1',
                'wali_kelas_id' => '2',
                'ket' => 'Kelompok Umur 5 sampai dengan < 6 Tahun',
            ],
        ];

        foreach ($dataKelas as $kls) {
            DB::table('kelas')->insert([
                'nama_kelas' => $kls['nama_kelas'],
                'tahun_ajaran_id' => $kls['tahun_ajaran_id'],
                'wali_kelas_id' => $kls['wali_kelas_id'],
                'ket' => $kls['ket'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

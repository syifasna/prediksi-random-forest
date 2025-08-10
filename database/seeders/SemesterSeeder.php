<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SemesterSeeder extends Seeder
{
    public function run()
    {
        $dataSemester = [
            // Block 1
            [
                'tahun_ajaran_id' => '1',
                'semester' => '1',
            ], [
                'tahun_ajaran_id' => '1',
                'semester' => '2',
            ],
        ];

        foreach ($dataSemester as $sem) {
            DB::table('semesters')->insert([
                'tahun_ajaran_id' => $sem['tahun_ajaran_id'],
                'semester' => $sem['semester'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

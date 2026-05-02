<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InputAspirasiSeeder extends Seeder {
    public function run() {
        DB::table('input_aspirasis')->insert([
            [
                'nis' => 1001,
                'id_kategori' => 1,
                'lokasi' => 'Kelas A',
                'keterangan' => 'AC rusak'
            ],
            [
                'nis' => 1002,
                'id_kategori' => 2,
                'lokasi' => 'Toilet',
                'keterangan' => 'Kurang bersih'
            ]
        ]);
    }
}

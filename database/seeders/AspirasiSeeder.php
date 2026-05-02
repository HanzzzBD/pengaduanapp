<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AspirasiSeeder extends Seeder {
    public function run() {
        DB::table('aspirasis')->insert([
            [
                'username' => 'admin1',
                'id_pelapor' => 1,
                'id_kategori' => 1,
                'status' => 'diproses',
                'feedback' => 'Sedang diperbaiki'
            ]
        ]);
    }
}

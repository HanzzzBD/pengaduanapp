<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder {
    public function run() {
        DB::table('siswas')->insert([
            ['nis' => 1001, 'kelas' => 'X RPL 1'],
            ['nis' => 1002, 'kelas' => 'X RPL 2'],
            ['nis' => 1003, 'kelas' => 'X TKJ 1'],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder {
    public function run() {
        DB::table('kategoris')->insert([
            ['ket_kat' => 'Fasilitas'],
            ['ket_kat' => 'Kebersihan'],
            ['ket_kat' => 'Keamanan'],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder {
    public function run() {
        DB::table('admins')->insert([
            [
                'username' => 'admin1',
                'password' => Hash::make('123456')
            ],
            [
                'username' => 'admin2',
                'password' => Hash::make('123456')
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
        ['id' => 1, 'pavadinimas' => 'Nuomotojas'],
        ['id' => 2, 'pavadinimas' => 'Nuomininkas'],
        ]);

    }
}

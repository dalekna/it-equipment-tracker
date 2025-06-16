<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VienetasStatusasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('vienetas_statusas')->insert([
            ['pavadinimas' => 'Laisvas'],
            ['pavadinimas' => 'Rezervuotas'],
            ['pavadinimas' => 'Sugedęs'],
        ]);
    }
}

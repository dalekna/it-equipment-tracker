<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamintojasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('gamintojas')->insert([
            ['pavadinimas' => 'Apple'],
            ['pavadinimas' => 'Samsung'],
            ['pavadinimas' => 'Dell'],
            ['pavadinimas' => 'HP'],
            ['pavadinimas' => 'Lenovo'],
            ['pavadinimas' => 'Asus'],
            ['pavadinimas' => 'Acer'],
            ['pavadinimas' => 'Sony'],
            ['pavadinimas' => 'LG'],
            ['pavadinimas' => 'Microsoft'],
        ]);
    }
}

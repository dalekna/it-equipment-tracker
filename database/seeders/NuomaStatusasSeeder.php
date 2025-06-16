<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NuomaStatusas;

class NuomaStatusasSeeder extends Seeder
{
    public function run()
    {
        NuomaStatusas::create(['pavadinimas' => 'Aktyvi']);
        NuomaStatusas::create(['pavadinimas' => 'Baigta']);
    }
}

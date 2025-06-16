<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tipas;

class TipasSeeder extends Seeder
{
    public function run(): void
    {
        Tipas::insert([
            ['pavadinimas' => 'Kompiuterinė technika'],
            ['pavadinimas' => 'Buitinė technika ir elektronika'],
            ['pavadinimas' => 'Kitos prekės'],
        ]);
    }
}


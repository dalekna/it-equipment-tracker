<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesTableSeeder::class,
            TipasSeeder::class,
            KategorijaSeeder::class,
            GamintojasSeeder::class,
            VienetasStatusasSeeder::class,
            NuomaStatusasSeeder::class,
        ]);
    }
}

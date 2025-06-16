<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tipas;
use App\Models\Kategorija;

class KategorijaSeeder extends Seeder
{
    public function run(): void
    {
        $tipai = [
            'Kompiuterinė technika' => [
                'Nešiojami kompiuteriai ir priedai',
                'Planšetiniai kompiuteriai ir priedai',
                'Stacionarūs kompiuteriai',
                'Atnaujinti naudoti kompiuteriai',
                'Žaidimų kompiuteriai ir gaming įranga',
                'Išmanieji namai',
                'Mini kompiuteriai (Sticks NUC HTPC)',
                'Monitoriai',
                'Spausdintuvai, skeneriai',
                'Išoriniai įrenginiai',
                'Kompiuterių kolonėlės',
                'Duomenų laikmenos',
                'Nešiojamų kompiuterių krepšiai, dėklai, kuprinės',
                'Kompiuterių komponentai',
                'Grafinės planšetės',
                'E-Skaityklės ir priedai',
                'Programinė įranga',
                'Tinklo įranga',
                'Kabeliai, laidai ir adapteriai',
                'Serveriai, komponentai ir priedai',
            ],
            'Buitinė technika ir elektronika' => [
                'Televizoriai',
                'Garso ir vaizdo technika',
                'Stambi virtuvės technika',
                'Skalbimo mašinos ir džiovyklės',
                'Smulki virtuvės technika',
                'Namų technika',
                'Grožis ir sveikata',
                'Oro reguliavimas',
                'Signalizacijos, apsaugos sistemos ir davikliai',
                'Įvairi namų technika',
            ],
            'Kitos prekės' => [
                // Kol kas tuščia, naudotojas galės įvesti savo
            ],
        ];

        foreach ($tipai as $tipasPavadinimas => $kategorijos) {
            $tipas = Tipas::firstOrCreate(['pavadinimas' => $tipasPavadinimas]);

            foreach ($kategorijos as $kategorija) {
                Kategorija::firstOrCreate([
                    'pavadinimas' => $kategorija,
                    'tipasid' => $tipas->id,
                ]);
            }
        }
    }
}

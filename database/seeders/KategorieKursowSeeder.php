<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategorieKursowSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategorie_kursow')->insert([
            [
                'nazwa' => 'Programowanie',
                'slug' => 'programowanie',
                'opis_krotki' => 'Kursy z zakresu programowania',
                'opis_pelny' => 'Kategoria obejmuje kursy programowania w roznych jezykach i technologiach.',
                'obrazek' => null,
                'meta_title' => 'Programowanie - Kursiki',
                'meta_description' => 'Kursy programowania online',
                'czy_aktywna' => true,
                'kolejnosc' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Web Development',
                'slug' => 'web-development',
                'opis_krotki' => 'Kursy tworzenia stron i aplikacji webowych',
                'opis_pelny' => 'Kategoria obejmuje frontend, backend i full stack web development.',
                'obrazek' => null,
                'meta_title' => 'Web Development - Kursiki',
                'meta_description' => 'Kursy web developmentu online',
                'czy_aktywna' => true,
                'kolejnosc' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Bazy Danych',
                'slug' => 'bazy-danych',
                'opis_krotki' => 'Kursy SQL i projektowania baz danych',
                'opis_pelny' => 'Kategoria obejmuje relacyjne bazy danych, SQL oraz modelowanie danych.',
                'obrazek' => null,
                'meta_title' => 'Bazy Danych - Kursiki',
                'meta_description' => 'Kursy baz danych online',
                'czy_aktywna' => true,
                'kolejnosc' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Sztuczna Inteligencja',
                'slug' => 'sztuczna-inteligencja',
                'opis_krotki' => 'Kursy AI i narzedzi wspieranych sztuczna inteligencja',
                'opis_pelny' => 'Kategoria obejmuje sztuczna inteligencje, automatyzacje i nowoczesne narzedzia.',
                'obrazek' => null,
                'meta_title' => 'Sztuczna Inteligencja - Kursiki',
                'meta_description' => 'Kursy AI online',
                'czy_aktywna' => true,
                'kolejnosc' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Cyberbezpieczenstwo',
                'slug' => 'cyberbezpieczenstwo',
                'opis_krotki' => 'Kursy bezpieczenstwa systemow i aplikacji',
                'opis_pelny' => 'Kategoria obejmuje podstawy i praktyke cyberbezpieczenstwa.',
                'obrazek' => null,
                'meta_title' => 'Cyberbezpieczenstwo - Kursiki',
                'meta_description' => 'Kursy cyberbezpieczenstwa online',
                'czy_aktywna' => true,
                'kolejnosc' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

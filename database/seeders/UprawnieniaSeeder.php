<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UprawnieniaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('uprawnienia')->insert([
            [
                'nazwa' => 'Zarzadzanie uzytkownikami',
                'slug' => 'zarzadzanie_uzytkownikami',
                'opis' => 'Pozwala zarzadzac kontami uzytkownikow',
                'czy_systemowe' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Zarzadzanie rolami',
                'slug' => 'zarzadzanie_rolami',
                'opis' => 'Pozwala zarzadzac rolami w systemie',
                'czy_systemowe' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Zarzadzanie uprawnieniami',
                'slug' => 'zarzadzanie_uprawnieniami',
                'opis' => 'Pozwala zarzadzac uprawnieniami w systemie',
                'czy_systemowe' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Zarzadzanie kursami',
                'slug' => 'zarzadzanie_kursami',
                'opis' => 'Pozwala tworzyc i edytowac kursy',
                'czy_systemowe' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Zarzadzanie kategoriami kursow',
                'slug' => 'zarzadzanie_kategoriami_kursow',
                'opis' => 'Pozwala zarzadzac kategoriami kursow',
                'czy_systemowe' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Zarzadzanie lekcjami',
                'slug' => 'zarzadzanie_lekcjami',
                'opis' => 'Pozwala tworzyc i edytowac lekcje',
                'czy_systemowe' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Zarzadzanie materialami',
                'slug' => 'zarzadzanie_materialami',
                'opis' => 'Pozwala zarzadzac materialami kursowymi',
                'czy_systemowe' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Zarzadzanie testami',
                'slug' => 'zarzadzanie_testami',
                'opis' => 'Pozwala zarzadzac testami i pytaniami',
                'czy_systemowe' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Zarzadzanie wpisami',
                'slug' => 'zarzadzanie_wpisami',
                'opis' => 'Pozwala tworzyc i edytowac wpisy',
                'czy_systemowe' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Zarzadzanie stronami',
                'slug' => 'zarzadzanie_stronami',
                'opis' => 'Pozwala zarzadzac stronami statycznymi',
                'czy_systemowe' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Zarzadzanie FAQ',
                'slug' => 'zarzadzanie_faq',
                'opis' => 'Pozwala zarzadzac pytaniami FAQ',
                'czy_systemowe' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Zarzadzanie opiniami',
                'slug' => 'zarzadzanie_opiniami',
                'opis' => 'Pozwala moderowac i publikowac opinie',
                'czy_systemowe' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Zarzadzanie zamowieniami',
                'slug' => 'zarzadzanie_zamowieniami',
                'opis' => 'Pozwala obslugiwac zamowienia',
                'czy_systemowe' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Zarzadzanie platnosciami',
                'slug' => 'zarzadzanie_platnosciami',
                'opis' => 'Pozwala obslugiwac platnosci',
                'czy_systemowe' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Zarzadzanie newsletterem',
                'slug' => 'zarzadzanie_newsletterem',
                'opis' => 'Pozwala zarzadzac subskrybentami newslettera',
                'czy_systemowe' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Obsluga wiadomosci kontaktowych',
                'slug' => 'obsluga_wiadomosci_kontaktowych',
                'opis' => 'Pozwala obslugiwac formularz kontaktowy',
                'czy_systemowe' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Podglad raportow',
                'slug' => 'podglad_raportow',
                'opis' => 'Pozwala przegladac raporty i statystyki',
                'czy_systemowe' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Zarzadzanie ustawieniami systemu',
                'slug' => 'zarzadzanie_ustawieniami_systemu',
                'opis' => 'Pozwala zarzadzac ustawieniami systemowymi',
                'czy_systemowe' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
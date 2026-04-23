<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusyZamowienSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('statusy_zamowien')->insert([
            [
                'nazwa' => 'Nowe',
                'slug' => 'nowe',
                'opis' => 'Nowo utworzone zamowienie',
                'kolejnosc' => 1,
                'czy_aktywny' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Oczekujace',
                'slug' => 'oczekujace',
                'opis' => 'Zamowienie oczekuje na dalsza obsluge',
                'kolejnosc' => 2,
                'czy_aktywny' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Oplacone',
                'slug' => 'oplacone',
                'opis' => 'Zamowienie zostalo oplacone',
                'kolejnosc' => 3,
                'czy_aktywny' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Anulowane',
                'slug' => 'anulowane',
                'opis' => 'Zamowienie zostalo anulowane',
                'kolejnosc' => 4,
                'czy_aktywny' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Zrealizowane',
                'slug' => 'zrealizowane',
                'opis' => 'Zamowienie zostalo zrealizowane',
                'kolejnosc' => 5,
                'czy_aktywny' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Zakonczone',
                'slug' => 'zakonczone',
                'opis' => 'Proces zamowienia zostal zakonczony',
                'kolejnosc' => 6,
                'czy_aktywny' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
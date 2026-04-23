<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusyPlatnosciSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('statusy_platnosci')->insert([
            [
                'nazwa' => 'Oczekujaca',
                'slug' => 'oczekujaca',
                'opis' => 'Platnosc oczekuje na realizacje',
                'kolejnosc' => 1,
                'czy_aktywny' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Rozpoczeta',
                'slug' => 'rozpoczeta',
                'opis' => 'Platnosc zostala rozpoczecia u operatora',
                'kolejnosc' => 2,
                'czy_aktywny' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Oplacona',
                'slug' => 'oplacona',
                'opis' => 'Platnosc zostala poprawnie oplacona',
                'kolejnosc' => 3,
                'czy_aktywny' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Zakonczona',
                'slug' => 'zakonczona',
                'opis' => 'Proces platnosci zostal zakonczony',
                'kolejnosc' => 4,
                'czy_aktywny' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Nieudana',
                'slug' => 'nieudana',
                'opis' => 'Platnosc nie powiodla sie',
                'kolejnosc' => 5,
                'czy_aktywny' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Anulowana',
                'slug' => 'anulowana',
                'opis' => 'Platnosc zostala anulowana',
                'kolejnosc' => 6,
                'czy_aktywny' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Zwrocona',
                'slug' => 'zwrocona',
                'opis' => 'Platnosc zostala zwrocona',
                'kolejnosc' => 7,
                'czy_aktywny' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusyKursowSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('statusy_kursow')->insert([
            [
                'nazwa' => 'Szkic',
                'slug' => 'szkic',
                'opis' => 'Kurs roboczy, niewidoczny publicznie',
                'czy_publiczny' => false,
                'kolejnosc' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Opublikowany',
                'slug' => 'opublikowany',
                'opis' => 'Kurs widoczny publicznie',
                'czy_publiczny' => true,
                'kolejnosc' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Ukryty',
                'slug' => 'ukryty',
                'opis' => 'Kurs chwilowo ukryty',
                'czy_publiczny' => false,
                'kolejnosc' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Archiwalny',
                'slug' => 'archiwalny',
                'opis' => 'Kurs archiwalny, nieaktywny',
                'czy_publiczny' => false,
                'kolejnosc' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
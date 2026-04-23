<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoziomyKursowSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('poziomy_kursow')->insert([
            [
                'nazwa' => 'Podstawowy',
                'slug' => 'podstawowy',
                'opis' => 'Dla osob rozpoczynajacych nauke',
                'kolejnosc' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Sredniozaawansowany',
                'slug' => 'sredniozaawansowany',
                'opis' => 'Dla osob posiadajacych podstawy',
                'kolejnosc' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Zaawansowany',
                'slug' => 'zaawansowany',
                'opis' => 'Dla osob z doswiadczeniem',
                'kolejnosc' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
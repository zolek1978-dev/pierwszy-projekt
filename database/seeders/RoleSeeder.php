<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('role')->insert([
            [
                'nazwa' => 'Super Administrator',
                'slug' => 'super_administrator',
                'opis' => 'Pelny dostep do calego systemu',
                'czy_systemowa' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Administrator',
                'slug' => 'administrator',
                'opis' => 'Zarzadza systemem i uzytkownikami',
                'czy_systemowa' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Moderator',
                'slug' => 'moderator',
                'opis' => 'Moderuje tresci i opinie',
                'czy_systemowa' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Redaktor',
                'slug' => 'redaktor',
                'opis' => 'Zarzadza tresciami i wpisami',
                'czy_systemowa' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Prowadzacy',
                'slug' => 'prowadzacy',
                'opis' => 'Tworzy kursy i lekcje',
                'czy_systemowa' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Kursant',
                'slug' => 'kursant',
                'opis' => 'Uczy sie na platformie',
                'czy_systemowa' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Obsluga Klienta',
                'slug' => 'obsluga_klienta',
                'opis' => 'Obsluguje zapytania i zamowienia',
                'czy_systemowa' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

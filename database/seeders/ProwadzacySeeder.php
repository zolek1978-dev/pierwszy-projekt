<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProwadzacySeeder extends Seeder
{
    public function run(): void
    {
        $userId = DB::table('users')->insertGetId([
            'name' => 'Jan Kowalski',
            'email' => 'jan.kowalski@kursiki.test',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('profile_uzytkownikow')->insert([
            'user_id' => $userId,
            'imie' => 'Jan',
            'nazwisko' => 'Kowalski',
            'telefon' => '500600700',
            'avatar' => null,
            'bio' => 'Doswiadczony prowadzacy kursow programistycznych.',
            'data_urodzenia' => null,
            'miasto' => 'Lodz',
            'kraj' => 'Polska',
            'strona_www' => null,
            'linkedin' => null,
            'github' => 'https://github.com/jankowalski',
            'czy_publiczny' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('prowadzacy')->insert([
            'user_id' => $userId,
            'slug' => 'jan-kowalski',
            'tytul' => 'mgr inz.',
            'opis_krotki' => 'Programista i prowadzacy kursy web developmentu.',
            'opis_pelny' => 'Specjalizuje sie w Laravelu, PHP, bazach danych oraz tworzeniu aplikacji webowych.',
            'zdjecie' => null,
            'specjalizacja' => 'Laravel, PHP, MySQL, Web Development',
            'doswiadczenie_lata' => 12,
            'facebook' => null,
            'linkedin' => 'https://linkedin.com/in/jankowalski',
            'youtube' => null,
            'strona_www' => null,
            'czy_publiczny' => true,
            'kolejnosc' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $rolaProwadzacyId = DB::table('role')->where('slug', 'prowadzacy')->value('id');

        if ($rolaProwadzacyId) {
            DB::table('uzytkownicy_role')->insert([
                'user_id' => $userId,
                'rola_id' => $rolaProwadzacyId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KursySeeder extends Seeder
{
    public function run(): void
    {
        $prowadzacyId = DB::table('prowadzacy')->value('id');

        $kategoriaProgramowanie = DB::table('kategorie_kursow')->where('slug', 'programowanie')->value('id');
        $kategoriaWeb = DB::table('kategorie_kursow')->where('slug', 'web-development')->value('id');
        $kategoriaBazy = DB::table('kategorie_kursow')->where('slug', 'bazy-danych')->value('id');

        $poziomPodstawowy = DB::table('poziomy_kursow')->where('slug', 'podstawowy')->value('id');
        $poziomSredni = DB::table('poziomy_kursow')->where('slug', 'sredniozaawansowany')->value('id');

        $statusOpublikowany = DB::table('statusy_kursow')->where('slug', 'opublikowany')->value('id');

        $kurs1 = DB::table('kursy')->insertGetId([
            'kategoria_kursu_id' => $kategoriaWeb,
            'prowadzacy_id' => $prowadzacyId,
            'poziom_kursu_id' => $poziomPodstawowy,
            'status_kursu_id' => $statusOpublikowany,
            'tytul' => 'Laravel od podstaw',
            'slug' => 'laravel-od-podstaw',
            'podtytul' => 'Kompletny start z frameworkiem Laravel',
            'opis_krotki' => 'Kurs dla osob, ktore chca nauczyc sie Laravela od zera.',
            'opis_pelny' => 'Poznasz routing, kontrolery, widoki, modele, migracje oraz budowe aplikacji webowych w Laravelu.',
            'dla_kogo' => 'Dla osob poczatkujacych i sredniozaawansowanych.',
            'czego_sie_nauczysz' => 'Tworzenia aplikacji w Laravelu, pracy z baza danych i architektury MVC.',
            'wymagania_wstepne' => 'Podstawy PHP i HTML.',
            'miniatura' => null,
            'obrazek_glowny' => null,
            'jezyk' => 'polski',
            'czas_trwania_minuty' => 600,
            'liczba_lekcji' => 24,
            'cena' => 199.00,
            'cena_promocyjna' => 149.00,
            'czy_darmowy' => false,
            'czy_wyrozniony' => true,
            'czy_bestseller' => true,
            'czy_nowy' => true,
            'data_publikacji' => now(),
            'meta_title' => 'Laravel od podstaw - Kursiki',
            'meta_description' => 'Naucz sie Laravela od podstaw w praktyczny sposob.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $kurs2 = DB::table('kursy')->insertGetId([
            'kategoria_kursu_id' => $kategoriaProgramowanie,
            'prowadzacy_id' => $prowadzacyId,
            'poziom_kursu_id' => $poziomPodstawowy,
            'status_kursu_id' => $statusOpublikowany,
            'tytul' => 'PHP od zera do praktyki',
            'slug' => 'php-od-zera-do-praktyki',
            'podtytul' => 'Nauka PHP krok po kroku',
            'opis_krotki' => 'Praktyczny kurs PHP dla osob zaczynajacych nauke backendu.',
            'opis_pelny' => 'Poznasz skladnie PHP, formularze, operacje na plikach, sesje, funkcje i podstawy programowania obiektowego.',
            'dla_kogo' => 'Dla osob zaczynajacych przygode z backendem.',
            'czego_sie_nauczysz' => 'Pisania skryptow PHP i budowy prostych aplikacji webowych.',
            'wymagania_wstepne' => 'Podstawy HTML beda pomocne.',
            'miniatura' => null,
            'obrazek_glowny' => null,
            'jezyk' => 'polski',
            'czas_trwania_minuty' => 720,
            'liczba_lekcji' => 30,
            'cena' => 179.00,
            'cena_promocyjna' => null,
            'czy_darmowy' => false,
            'czy_wyrozniony' => true,
            'czy_bestseller' => false,
            'czy_nowy' => true,
            'data_publikacji' => now(),
            'meta_title' => 'PHP od zera do praktyki - Kursiki',
            'meta_description' => 'Praktyczny kurs PHP online dla poczatkujacych.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $kurs3 = DB::table('kursy')->insertGetId([
            'kategoria_kursu_id' => $kategoriaBazy,
            'prowadzacy_id' => $prowadzacyId,
            'poziom_kursu_id' => $poziomSredni,
            'status_kursu_id' => $statusOpublikowany,
            'tytul' => 'SQL i MySQL w praktyce',
            'slug' => 'sql-i-mysql-w-praktyce',
            'podtytul' => 'Projektowanie i obsluga baz danych',
            'opis_krotki' => 'Kurs SQL i MySQL dla osob, ktore chca pracowac z baza danych praktycznie.',
            'opis_pelny' => 'Poznasz tabele, relacje, JOIN, indeksy, zapytania, normalizacje oraz praktyczna prace z MySQL.',
            'dla_kogo' => 'Dla programistow, administratorow i analitykow.',
            'czego_sie_nauczysz' => 'Pisania zapytan SQL i projektowania relacyjnych baz danych.',
            'wymagania_wstepne' => 'Podstawy informatyki i pracy z danymi.',
            'miniatura' => null,
            'obrazek_glowny' => null,
            'jezyk' => 'polski',
            'czas_trwania_minuty' => 540,
            'liczba_lekcji' => 18,
            'cena' => 159.00,
            'cena_promocyjna' => 129.00,
            'czy_darmowy' => false,
            'czy_wyrozniony' => false,
            'czy_bestseller' => true,
            'czy_nowy' => false,
            'data_publikacji' => now(),
            'meta_title' => 'SQL i MySQL w praktyce - Kursiki',
            'meta_description' => 'Naucz sie SQL i MySQL w praktyce.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $tagLaravel = DB::table('tagi_kursow')->where('slug', 'laravel')->value('id');
        $tagPhp = DB::table('tagi_kursow')->where('slug', 'php')->value('id');
        $tagMysql = DB::table('tagi_kursow')->where('slug', 'mysql')->value('id');

        DB::table('kursy_tagi')->insert([
            [
                'kurs_id' => $kurs1,
                'tag_kursu_id' => $tagLaravel,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kurs_id' => $kurs1,
                'tag_kursu_id' => $tagPhp,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kurs_id' => $kurs2,
                'tag_kursu_id' => $tagPhp,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kurs_id' => $kurs3,
                'tag_kursu_id' => $tagMysql,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
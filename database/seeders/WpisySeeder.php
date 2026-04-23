<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WpisySeeder extends Seeder
{
    public function run(): void
    {
        $autorId = DB::table('users')->where('email', 'jan.kowalski@kursiki.test')->value('id');

        $kategoriaPoradniki = DB::table('kategorie_wpisow')->where('slug', 'poradniki')->value('id');
        $kategoriaTechnologie = DB::table('kategorie_wpisow')->where('slug', 'technologie')->value('id');

        $wpis1 = DB::table('wpisy')->insertGetId([
            'autor_id' => $autorId,
            'kategoria_wpisu_id' => $kategoriaPoradniki,
            'tytul' => 'Jak zacząć naukę Laravela krok po kroku',
            'slug' => 'jak-zaczac-nauke-laravela-krok-po-kroku',
            'zajawka' => 'Praktyczny przewodnik dla osób, które chcą wejść w świat Laravela bez chaosu.',
            'tresc' => '<p>Laravel to jeden z najpopularniejszych frameworków PHP. Jeśli chcesz zacząć naukę w sposób uporządkowany, warto najpierw zrozumieć routing, kontrolery, widoki, migracje oraz modele Eloquent.</p><p>Dobrze jest też od razu budować mały projekt praktyczny, zamiast ograniczać się do samej teorii.</p>',
            'obrazek' => null,
            'status' => 'opublikowany',
            'data_publikacji' => now(),
            'meta_title' => 'Jak zacząć naukę Laravela - Kursiki',
            'meta_description' => 'Praktyczny poradnik dla osób uczących się Laravela.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $wpis2 = DB::table('wpisy')->insertGetId([
            'autor_id' => $autorId,
            'kategoria_wpisu_id' => $kategoriaTechnologie,
            'tytul' => 'Dlaczego warto znać SQL niezależnie od frameworka',
            'slug' => 'dlaczego-warto-znac-sql-niezaleznie-od-frameworka',
            'zajawka' => 'SQL to jedna z najbardziej uniwersalnych umiejętności w pracy z danymi i aplikacjami.',
            'tresc' => '<p>Niezależnie od tego, czy pracujesz w Laravelu, Symfony, .NET czy Pythonie, znajomość SQL daje ogromną przewagę. Pozwala lepiej rozumieć dane, optymalizować zapytania i świadomie projektować strukturę bazy.</p><p>Framework pomaga, ale podstawy SQL są nie do zastąpienia.</p>',
            'obrazek' => null,
            'status' => 'opublikowany',
            'data_publikacji' => now(),
            'meta_title' => 'Dlaczego warto znać SQL - Kursiki',
            'meta_description' => 'Dowiedz się, dlaczego SQL jest ważny niezależnie od frameworka.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $tagLaravel = DB::table('tagi_wpisow')->where('slug', 'laravel')->value('id');
        $tagPhp = DB::table('tagi_wpisow')->where('slug', 'php')->value('id');
        $tagSql = DB::table('tagi_wpisow')->where('slug', 'sql')->value('id');

        DB::table('wpisy_tagi')->insert([
            [
                'wpis_id' => $wpis1,
                'tag_wpisu_id' => $tagLaravel,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'wpis_id' => $wpis1,
                'tag_wpisu_id' => $tagPhp,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'wpis_id' => $wpis2,
                'tag_wpisu_id' => $tagSql,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
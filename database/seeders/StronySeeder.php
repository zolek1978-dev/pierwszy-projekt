<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StronySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('strony')->insert([
            [
                'tytul' => 'O nas',
                'slug' => 'o-nas',
                'tresc' => '<p>Kursiki to nowoczesna platforma edukacyjna tworzona z myślą o praktycznej nauce technologii, programowania, baz danych, AI i kompetencji cyfrowych. Naszym celem jest dostarczanie kursów, które przekładają się na realne umiejętności.</p><p>Łączymy wiedzę ekspercką, doświadczenie dydaktyczne i praktyczne podejście do nauczania. Chcemy, aby nauka była zrozumiała, uporządkowana i nastawiona na konkretne efekty.</p>',
                'meta_title' => 'O nas - Kursiki',
                'meta_description' => 'Poznaj platformę Kursiki i naszą misję edukacyjną.',
                'czy_opublikowana' => true,
                'data_publikacji' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tytul' => 'Regulamin',
                'slug' => 'regulamin',
                'tresc' => '<p>To jest przykładowa treść regulaminu platformy Kursiki. Docelowo w tym miejscu będzie znajdować się pełna treść regulaminu świadczenia usług drogą elektroniczną.</p>',
                'meta_title' => 'Regulamin - Kursiki',
                'meta_description' => 'Regulamin korzystania z platformy Kursiki.',
                'czy_opublikowana' => true,
                'data_publikacji' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tytul' => 'Polityka prywatności',
                'slug' => 'polityka-prywatnosci',
                'tresc' => '<p>To jest przykładowa treść polityki prywatności. Docelowo w tym miejscu opiszemy zasady przetwarzania danych osobowych, cookies oraz prawa użytkowników.</p>',
                'meta_title' => 'Polityka prywatności - Kursiki',
                'meta_description' => 'Polityka prywatności platformy Kursiki.',
                'czy_opublikowana' => true,
                'data_publikacji' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tytul' => 'Polityka cookies',
                'slug' => 'polityka-cookies',
                'tresc' => '<p>To jest przykładowa treść polityki cookies. Docelowo będą tu opisane technologie cookies, analityka oraz ustawienia prywatności.</p>',
                'meta_title' => 'Polityka cookies - Kursiki',
                'meta_description' => 'Informacje o cookies w serwisie Kursiki.',
                'czy_opublikowana' => true,
                'data_publikacji' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
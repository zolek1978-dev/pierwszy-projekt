<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PytaniaFaqSeeder extends Seeder
{
    public function run(): void
    {
        $kursyId = DB::table('kategorie_faq')->where('slug', 'kursy')->value('id');
        $platnosciId = DB::table('kategorie_faq')->where('slug', 'platnosci')->value('id');
        $kontoId = DB::table('kategorie_faq')->where('slug', 'konto-i-dostep')->value('id');

        DB::table('pytania_faq')->insert([
            [
                'kategoria_faq_id' => $kursyId,
                'pytanie' => 'Czy kursy są dostępne od razu po zakupie?',
                'odpowiedz' => 'Tak, po poprawnym zaksięgowaniu płatności dostęp do kursu jest nadawany automatycznie.',
                'kolejnosc' => 1,
                'czy_opublikowane' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategoria_faq_id' => $kursyId,
                'pytanie' => 'Czy mogę uczyć się we własnym tempie?',
                'odpowiedz' => 'Tak, kursy online są przygotowane tak, aby można było realizować je w dogodnym dla siebie czasie.',
                'kolejnosc' => 2,
                'czy_opublikowane' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategoria_faq_id' => $platnosciId,
                'pytanie' => 'Jakie metody płatności są dostępne?',
                'odpowiedz' => 'Docelowo platforma będzie obsługiwać popularne metody płatności online, w tym szybkie przelewy i karty.',
                'kolejnosc' => 1,
                'czy_opublikowane' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategoria_faq_id' => $platnosciId,
                'pytanie' => 'Czy otrzymam fakturę?',
                'odpowiedz' => 'Tak, po zakupie będzie możliwość wygenerowania dokumentu sprzedaży zgodnie z danymi podanymi przy zamówieniu.',
                'kolejnosc' => 2,
                'czy_opublikowane' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategoria_faq_id' => $kontoId,
                'pytanie' => 'Czy muszę mieć konto, aby korzystać z kursów?',
                'odpowiedz' => 'Tak, konto użytkownika jest potrzebne do śledzenia postępów, dostępu do materiałów i historii zamówień.',
                'kolejnosc' => 1,
                'czy_opublikowane' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategoria_faq_id' => $kontoId,
                'pytanie' => 'Co zrobić, jeśli nie pamiętam hasła?',
                'odpowiedz' => 'Na stronie logowania będzie dostępna funkcja resetu hasła, która pozwoli odzyskać dostęp do konta.',
                'kolejnosc' => 2,
                'czy_opublikowane' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
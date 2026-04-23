<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategorieFaqSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategorie_faq')->insert([
            [
                'nazwa' => 'Kursy',
                'slug' => 'kursy',
                'kolejnosc' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Płatności',
                'slug' => 'platnosci',
                'kolejnosc' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Konto i dostęp',
                'slug' => 'konto-i-dostep',
                'kolejnosc' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
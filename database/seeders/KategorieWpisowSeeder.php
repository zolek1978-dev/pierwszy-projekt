<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategorieWpisowSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategorie_wpisow')->insert([
            [
                'nazwa' => 'Poradniki',
                'slug' => 'poradniki',
                'opis' => 'Praktyczne poradniki i instrukcje.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Aktualnosci',
                'slug' => 'aktualnosci',
                'opis' => 'Nowosci i informacje z platformy.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Technologie',
                'slug' => 'technologie',
                'opis' => 'Artykuly o technologiach i narzedziach.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
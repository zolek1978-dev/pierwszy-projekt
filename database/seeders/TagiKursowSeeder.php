<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagiKursowSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tagi_kursow')->insert([
            [
                'nazwa' => 'Laravel',
                'slug' => 'laravel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'PHP',
                'slug' => 'php',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'MySQL',
                'slug' => 'mysql',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'JavaScript',
                'slug' => 'javascript',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'HTML',
                'slug' => 'html',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'CSS',
                'slug' => 'css',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'AI',
                'slug' => 'ai',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
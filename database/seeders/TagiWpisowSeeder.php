<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagiWpisowSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tagi_wpisow')->insert([
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
                'nazwa' => 'SQL',
                'slug' => 'sql',
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
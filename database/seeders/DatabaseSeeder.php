<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UprawnieniaSeeder::class,
            RoleUprawnieniaSeeder::class,
            StatusyZamowienSeeder::class,
            StatusyPlatnosciSeeder::class,
            StatusyKursowSeeder::class,
            PoziomyKursowSeeder::class,
            KategorieKursowSeeder::class,
            TagiKursowSeeder::class,
            ProwadzacySeeder::class,
            KursySeeder::class,
            KategorieFaqSeeder::class,
            PytaniaFaqSeeder::class,
            StronySeeder::class,
            KategorieWpisowSeeder::class,
            TagiWpisowSeeder::class,
            WpisySeeder::class,
        ]);
    }
}

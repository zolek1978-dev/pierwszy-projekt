<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUprawnieniaSeeder extends Seeder
{
    public function run(): void
    {
        $role = DB::table('role')->pluck('id', 'slug');
        $uprawnienia = DB::table('uprawnienia')->pluck('id', 'slug');

        $mapowanie = [
            'super_administrator' => [
                'zarzadzanie_uzytkownikami',
                'zarzadzanie_rolami',
                'zarzadzanie_uprawnieniami',
                'zarzadzanie_kursami',
                'zarzadzanie_kategoriami_kursow',
                'zarzadzanie_lekcjami',
                'zarzadzanie_materialami',
                'zarzadzanie_testami',
                'zarzadzanie_wpisami',
                'zarzadzanie_stronami',
                'zarzadzanie_faq',
                'zarzadzanie_opiniami',
                'zarzadzanie_zamowieniami',
                'zarzadzanie_platnosciami',
                'zarzadzanie_newsletterem',
                'obsluga_wiadomosci_kontaktowych',
                'podglad_raportow',
                'zarzadzanie_ustawieniami_systemu',
            ],

            'administrator' => [
                'zarzadzanie_uzytkownikami',
                'zarzadzanie_kursami',
                'zarzadzanie_kategoriami_kursow',
                'zarzadzanie_lekcjami',
                'zarzadzanie_materialami',
                'zarzadzanie_testami',
                'zarzadzanie_wpisami',
                'zarzadzanie_stronami',
                'zarzadzanie_faq',
                'zarzadzanie_opiniami',
                'zarzadzanie_zamowieniami',
                'zarzadzanie_platnosciami',
                'zarzadzanie_newsletterem',
                'obsluga_wiadomosci_kontaktowych',
                'podglad_raportow',
            ],

            'moderator' => [
                'zarzadzanie_opiniami',
                'zarzadzanie_faq',
                'obsluga_wiadomosci_kontaktowych',
            ],

            'redaktor' => [
                'zarzadzanie_wpisami',
                'zarzadzanie_stronami',
                'zarzadzanie_faq',
            ],

            'prowadzacy' => [
                'zarzadzanie_kursami',
                'zarzadzanie_lekcjami',
                'zarzadzanie_materialami',
                'zarzadzanie_testami',
            ],

            'kursant' => [
            ],

            'obsluga_klienta' => [
                'zarzadzanie_zamowieniami',
                'zarzadzanie_platnosciami',
                'obsluga_wiadomosci_kontaktowych',
                'podglad_raportow',
            ],
        ];

        $doInsertu = [];

        foreach ($mapowanie as $slugRoli => $listaUprawnien) {
            if (!isset($role[$slugRoli])) {
                continue;
            }

            foreach ($listaUprawnien as $slugUprawnienia) {
                if (!isset($uprawnienia[$slugUprawnienia])) {
                    continue;
                }

                $doInsertu[] = [
                    'rola_id' => $role[$slugRoli],
                    'uprawnienie_id' => $uprawnienia[$slugUprawnienia],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('role_uprawnienia')->insert($doInsertu);
    }
}

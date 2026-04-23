<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PanelController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $profil = DB::table('profile_uzytkownikow')
            ->where('user_id', $user->id)
            ->first();

        $role = DB::table('uzytkownicy_role')
            ->join('role', 'uzytkownicy_role.rola_id', '=', 'role.id')
            ->where('uzytkownicy_role.user_id', $user->id)
            ->select('role.nazwa', 'role.slug')
            ->get();

        $mojeKursy = DB::table('zapisy_na_kursy')
            ->join('kursy', 'zapisy_na_kursy.kurs_id', '=', 'kursy.id')
            ->leftJoin('kategorie_kursow', 'kursy.kategoria_kursu_id', '=', 'kategorie_kursow.id')
            ->leftJoin('poziomy_kursow', 'kursy.poziom_kursu_id', '=', 'poziomy_kursow.id')
            ->where('zapisy_na_kursy.user_id', $user->id)
            ->select(
                'zapisy_na_kursy.id as zapis_id',
                'zapisy_na_kursy.status',
                'zapisy_na_kursy.data_zapisu',
                'zapisy_na_kursy.data_rozpoczecia',
                'zapisy_na_kursy.data_wygasniecia',
                'kursy.id as kurs_id',
                'kursy.tytul',
                'kursy.slug',
                'kursy.opis_krotki',
                'kursy.czas_trwania_minuty',
                'kursy.liczba_lekcji',
                'kursy.jezyk',
                'kategorie_kursow.nazwa as kategoria_nazwa',
                'poziomy_kursow.nazwa as poziom_nazwa'
            )
            ->orderByDesc('zapisy_na_kursy.data_zapisu')
            ->get();

        return view('panel.index', [
            'user' => $user,
            'profil' => $profil,
            'role' => $role,
            'mojeKursy' => $mojeKursy,
        ]);
    }
}
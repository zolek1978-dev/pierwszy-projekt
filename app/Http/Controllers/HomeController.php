<?php

namespace App\Http\Controllers;

use App\Models\Kurs;
use App\Models\KategoriaKursu;

class HomeController extends Controller
{
    public function index()
    {
        $wyroznioneKursy = Kurs::with(['kategoria', 'poziom', 'prowadzacy.user'])
            ->where('czy_wyrozniony', true)
            ->whereHas('status', function ($query) {
                $query->where('slug', 'opublikowany');
            })
            ->latest()
            ->take(6)
            ->get();

        $najnowszeKursy = Kurs::with(['kategoria', 'poziom', 'prowadzacy.user'])
            ->whereHas('status', function ($query) {
                $query->where('slug', 'opublikowany');
            })
            ->latest()
            ->take(6)
            ->get();

        $kategorie = KategoriaKursu::where('czy_aktywna', true)
            ->orderBy('kolejnosc')
            ->get();

        return view('home.index', compact('wyroznioneKursy', 'najnowszeKursy', 'kategorie'));
    }
}
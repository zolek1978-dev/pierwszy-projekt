<?php

namespace App\Http\Controllers;

use App\Models\Kurs;
use App\Models\KategoriaKursu;
use App\Models\PoziomKursu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Kurs::with(['kategoria', 'poziom', 'prowadzacy.user', 'tagi'])
            ->whereHas('status', function ($q) {
                $q->where('slug', 'opublikowany');
            });

        if ($request->filled('kategoria')) {
            $query->whereHas('kategoria', function ($q) use ($request) {
                $q->where('slug', $request->kategoria);
            });
        }

        if ($request->filled('poziom')) {
            $query->whereHas('poziom', function ($q) use ($request) {
                $q->where('slug', $request->poziom);
            });
        }

        if ($request->filled('szukaj')) {
            $szukaj = $request->szukaj;

            $query->where(function ($q) use ($szukaj) {
                $q->where('tytul', 'like', "%{$szukaj}%")
                  ->orWhere('opis_krotki', 'like', "%{$szukaj}%")
                  ->orWhere('opis_pelny', 'like', "%{$szukaj}%");
            });
        }

        $kursy = $query->latest()->paginate(9)->withQueryString();

        $kategorie = KategoriaKursu::where('czy_aktywna', true)
            ->orderBy('kolejnosc')
            ->get();

        $poziomy = PoziomKursu::orderBy('kolejnosc')->get();

        return view('kursy.index', compact('kursy', 'kategorie', 'poziomy'));
    }

    public function show(Request $request, string $slug)
    {
        $kurs = Kurs::with([
                'kategoria',
                'poziom',
                'status',
                'prowadzacy.user',
                'tagi',
                'sekcje.lekcje'
            ])
            ->where('slug', $slug)
            ->whereHas('status', function ($q) {
                $q->where('slug', 'opublikowany');
            })
            ->firstOrFail();

        $podobneKursy = Kurs::with(['kategoria', 'poziom'])
            ->where('id', '!=', $kurs->id)
            ->where('kategoria_kursu_id', $kurs->kategoria_kursu_id)
            ->whereHas('status', function ($q) {
                $q->where('slug', 'opublikowany');
            })
            ->take(3)
            ->get();

        $czyZapisany = false;

        if ($request->user()) {
            $czyZapisany = DB::table('zapisy_na_kursy')
                ->where('user_id', $request->user()->id)
                ->where('kurs_id', $kurs->id)
                ->exists();
        }

        return view('kursy.show', compact('kurs', 'podobneKursy', 'czyZapisany'));
    }
}
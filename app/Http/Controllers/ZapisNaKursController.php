<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZapisNaKursController extends Controller
{
    public function store(Request $request, string $slug)
    {
        $user = $request->user();

        $kurs = DB::table('kursy')
            ->where('slug', $slug)
            ->first();

        if (!$kurs) {
            abort(404);
        }

        $istniejacyZapis = DB::table('zapisy_na_kursy')
            ->where('user_id', $user->id)
            ->where('kurs_id', $kurs->id)
            ->first();

        if ($istniejacyZapis) {
            return redirect()
                ->route('kursy.show', $slug)
                ->with('success', 'Jesteś już zapisany na ten kurs.');
        }

        DB::table('zapisy_na_kursy')->insert([
            'user_id' => $user->id,
            'kurs_id' => $kurs->id,
            'status' => 'aktywny',
            'data_zapisu' => now(),
            'data_rozpoczecia' => null,
            'data_wygasniecia' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('panel.index')
            ->with('success', 'Zostałeś zapisany na kurs.');
    }
}
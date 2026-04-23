<?php

namespace App\Http\Controllers;

use App\Models\Strona;

class StronaController extends Controller
{
    public function show($slug)
    {
        $strona = Strona::where('slug', $slug)
            ->where('czy_opublikowana', true)
            ->firstOrFail();

        return view('strony.show', compact('strona'));
    }
}
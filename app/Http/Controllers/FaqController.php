<?php

namespace App\Http\Controllers;

use App\Models\KategoriaFaq;

class FaqController extends Controller
{
    public function index()
    {
        $kategorieFaq = KategoriaFaq::with(['pytania' => function ($query) {
                $query->where('czy_opublikowane', true)
                    ->orderBy('kolejnosc');
            }])
            ->orderBy('kolejnosc')
            ->get();

        return view('faq.index', compact('kategorieFaq'));
    }
}
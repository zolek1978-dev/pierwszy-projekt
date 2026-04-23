<?php

namespace App\Http\Controllers;

use App\Models\WiadomoscKontaktowa;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('kontakt.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'imie' => ['required', 'string', 'max:100'],
            'nazwisko' => ['nullable', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'telefon' => ['nullable', 'string', 'max:50'],
            'temat' => ['nullable', 'string', 'max:255'],
            'wiadomosc' => ['required', 'string', 'min:10'],
        ]);

        WiadomoscKontaktowa::create([
            'imie' => $validated['imie'],
            'nazwisko' => $validated['nazwisko'] ?? null,
            'email' => $validated['email'],
            'telefon' => $validated['telefon'] ?? null,
            'temat' => $validated['temat'] ?? null,
            'wiadomosc' => $validated['wiadomosc'],
            'status' => 'nowa',
            'ip_uzytkownika' => $request->ip(),
        ]);

        return redirect()
            ->route('kontakt.index')
            ->with('success', 'Wiadomość została wysłana. Dziękujemy za kontakt.');
    }
}
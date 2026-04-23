<?php

namespace App\Http\Controllers;

use App\Models\SubskrybentNewslettera;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'imie' => ['nullable', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'zgoda' => ['accepted'], // checkbox musi być zaznaczony
        ]);

        $subskrybent = SubskrybentNewslettera::where('email', $validated['email'])->first();

        if ($subskrybent) {
            if ($subskrybent->status === 'aktywny') {
                return back()
                    ->with('newsletter_info', 'Ten adres e-mail jest już zapisany do newslettera.')
                    ->withInput();
            }

            $subskrybent->update([
                'imie' => $validated['imie'] ?? $subskrybent->imie,
                'status' => 'aktywny',
                'zgoda_marketingowa' => true,
                'data_zapisu' => now(),
                'data_wypisu' => null,
            ]);

            return back()->with('newsletter_success', 'Adres został ponownie zapisany.');
        }

        SubskrybentNewslettera::create([
            'imie' => $validated['imie'] ?? null,
            'email' => $validated['email'],
            'status' => 'aktywny',
            'zgoda_marketingowa' => true,
            'data_zapisu' => now(),
        ]);

        return back()->with('newsletter_success', 'Dziękujemy za zapis do newslettera.');
    }
}
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ProfilUzytkownika;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'imie' => ['required', 'string', 'max:100'],
            'nazwisko' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'haslo' => ['required', 'confirmed', Password::min(8)],
            'zgoda' => ['accepted'],
        ], [
            'zgoda.accepted' => 'Musisz zaakceptować zgodę, aby utworzyć konto.',
            'haslo.confirmed' => 'Hasła nie są takie same.',
        ]);

        $user = null;

        DB::transaction(function () use ($validated, &$user) {
            $user = User::create([
                'name' => trim($validated['imie'] . ' ' . $validated['nazwisko']),
                'email' => $validated['email'],
                'password' => Hash::make($validated['haslo']),
            ]);

            ProfilUzytkownika::create([
                'user_id' => $user->id,
                'imie' => $validated['imie'],
                'nazwisko' => $validated['nazwisko'],
                'czy_publiczny' => false,
            ]);

            $rolaKursant = Role::where('slug', 'kursant')->first();

            if ($rolaKursant) {
                DB::table('uzytkownicy_role')->insert([
                    'user_id' => $user->id,
                    'rola_id' => $rolaKursant->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('panel.index')->with('success', 'Konto zostało utworzone i jesteś już zalogowany.');
    }
}
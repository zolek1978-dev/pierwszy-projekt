<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'haslo' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        if (!Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['haslo'],
        ], $remember)) {
            throw ValidationException::withMessages([
                'email' => 'Nieprawidłowy adres e-mail lub hasło.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('panel.index'));
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Zostałeś wylogowany.');
    }
}
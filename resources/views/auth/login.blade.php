@extends('layouts.app')

@section('content')
    <section class="bg-gradient-to-br from-slate-950 via-slate-900 to-blue-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 md:py-16">
            <div class="max-w-3xl">
                <span class="inline-flex items-center rounded-full bg-white/10 px-4 py-2 text-sm font-medium text-blue-100 mb-4">
                    Logowanie
                </span>

                <h1 class="text-4xl md:text-5xl font-bold tracking-tight leading-tight">
                    Zaloguj się
                </h1>

                <p class="mt-4 text-lg text-slate-300 leading-8">
                    Zaloguj się do swojego konta i przejdź do materiałów, kursów oraz swojej przyszłej strefy użytkownika.
                </p>
            </div>
        </div>
    </section>

    <section class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pt-4 pb-10">
        <div class="overflow-hidden rounded-2xl border border-blue-100 bg-white shadow-sm">
            <div class="bg-gradient-to-br from-blue-600 via-blue-500 to-blue-700 text-white p-5">
                <h2 class="text-lg font-bold">Formularz logowania</h2>
            </div>

            <div class="p-6">
                @if($errors->any())
                    <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-red-800">
                        <ul class="space-y-1">
                            @foreach($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.store') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="mb-2 block text-sm font-medium text-slate-700">E-mail</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="w-full rounded-xl border border-blue-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none"
                            required
                        >
                    </div>

                    <div>
                        <label for="haslo" class="mb-2 block text-sm font-medium text-slate-700">Hasło</label>
                        <input
                            type="password"
                            id="haslo"
                            name="haslo"
                            class="w-full rounded-xl border border-blue-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none"
                            required
                        >
                    </div>

                    <label class="flex items-center gap-3 text-sm text-slate-600">
                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                            class="rounded border-slate-300 text-blue-600 focus:ring-blue-500"
                        >
                        <span>Zapamiętaj mnie</span>
                    </label>

                    <div class="flex flex-wrap items-center gap-4 pt-2">
                        <button type="submit" class="inline-flex items-center rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white hover:bg-blue-700 transition shadow-sm">
                            Zaloguj się
                        </button>

                        <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline">
                            Nie masz konta? Zarejestruj się
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
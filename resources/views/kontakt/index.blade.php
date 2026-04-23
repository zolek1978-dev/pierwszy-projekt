@extends('layouts.app')

@section('content')
    <section class="bg-gradient-to-br from-slate-950 via-slate-900 to-blue-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 md:py-16">
            <div class="max-w-3xl">
                <span class="inline-flex items-center rounded-full bg-white/10 px-4 py-2 text-sm font-medium text-blue-100 mb-4">
                    Kontakt
                </span>

                <h1 class="text-4xl md:text-5xl font-bold tracking-tight leading-tight">
                    Skontaktuj się z nami
                </h1>

                <p class="mt-4 text-lg text-slate-300 leading-8">
                    Masz pytanie dotyczące kursów, współpracy albo działania platformy? Napisz do nas — chętnie pomożemy.
                </p>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-10">
        @if(session('success'))
            <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-green-800 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-red-800 shadow-sm">
                <ul class="space-y-1">
                    @foreach($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid gap-8 xl:grid-cols-[minmax(0,1fr)_360px]">
            <div class="rounded-3xl border border-blue-100 bg-white p-6 md:p-8 shadow-lg shadow-blue-100/40">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-slate-900">Napisz do nas</h2>
                    <p class="mt-2 text-slate-600 leading-7">
                        Wypełnij formularz kontaktowy, a odpowiemy tak szybko, jak to możliwe.
                    </p>
                </div>

                <form method="POST" action="{{ route('kontakt.store') }}" class="space-y-5">
                    @csrf

                    <div class="grid gap-5 md:grid-cols-2">
                        <div>
                            <label for="imie" class="mb-2 block text-sm font-medium text-slate-700">Imię</label>
                            <input
                                type="text"
                                id="imie"
                                name="imie"
                                value="{{ old('imie') }}"
                                class="w-full rounded-xl border border-blue-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none"
                                required
                            >
                        </div>

                        <div>
                            <label for="nazwisko" class="mb-2 block text-sm font-medium text-slate-700">Nazwisko</label>
                            <input
                                type="text"
                                id="nazwisko"
                                name="nazwisko"
                                value="{{ old('nazwisko') }}"
                                class="w-full rounded-xl border border-blue-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none"
                            >
                        </div>
                    </div>

                    <div class="grid gap-5 md:grid-cols-2">
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
                            <label for="telefon" class="mb-2 block text-sm font-medium text-slate-700">Telefon</label>
                            <input
                                type="text"
                                id="telefon"
                                name="telefon"
                                value="{{ old('telefon') }}"
                                class="w-full rounded-xl border border-blue-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none"
                            >
                        </div>
                    </div>

                    <div>
                        <label for="temat" class="mb-2 block text-sm font-medium text-slate-700">Temat</label>
                        <input
                            type="text"
                            id="temat"
                            name="temat"
                            value="{{ old('temat') }}"
                            class="w-full rounded-xl border border-blue-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none"
                        >
                    </div>

                    <div>
                        <label for="wiadomosc" class="mb-2 block text-sm font-medium text-slate-700">Wiadomość</label>
                        <textarea
                            id="wiadomosc"
                            name="wiadomosc"
                            rows="8"
                            class="w-full rounded-xl border border-blue-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none"
                            required
                        >{{ old('wiadomosc') }}</textarea>
                    </div>

                    <button type="submit" class="inline-flex items-center rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white hover:bg-blue-700 transition shadow-sm">
                        Wyślij wiadomość
                    </button>
                </form>
            </div>

            <div class="space-y-6">
                <div class="rounded-3xl border border-blue-100 bg-white p-6 shadow-sm">
                    <h2 class="text-xl font-semibold text-slate-900">Dane kontaktowe</h2>
                    <div class="mt-4 space-y-3 text-slate-600">
                        <p><strong>E-mail:</strong> kontakt@kursiki.test</p>
                        <p><strong>Telefon:</strong> +48 500 600 700</p>
                        <p><strong>Miasto:</strong> Łódź</p>
                    </div>
                </div>

                <div class="rounded-3xl border border-blue-100 bg-white p-6 shadow-sm">
                    <h2 class="text-xl font-semibold text-slate-900">Godziny kontaktu</h2>
                    <div class="mt-4 space-y-2 text-slate-600">
                        <p>Poniedziałek - Piątek</p>
                        <p>8:00 - 16:00</p>
                    </div>
                </div>

                <div class="rounded-3xl overflow-hidden border border-blue-100 bg-white shadow-sm">
                    <div class="p-6 border-b border-slate-200">
                        <h2 class="text-xl font-semibold text-slate-900">Lokalizacja</h2>
                        <p class="mt-2 text-sm text-slate-600">
                            Tutaj możesz później osadzić mapę Google lub OpenStreetMap.
                        </p>
                    </div>

                    <div class="h-64 bg-gradient-to-br from-blue-100 via-white to-slate-100 flex items-center justify-center text-sm text-slate-500">
                        Miejsce na mapę
                    </div>
                </div>

                <div class="rounded-3xl bg-gradient-to-br from-blue-700 via-blue-600 to-slate-900 p-6 text-white shadow-lg">
                    <h2 class="text-xl font-semibold">Masz pytanie o kurs?</h2>
                    <p class="mt-3 text-blue-100 leading-7">
                        Napisz do nas, a pomożemy dobrać najlepszą ścieżkę nauki i odpowiedni kurs.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
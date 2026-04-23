@extends('layouts.app')

@section('content')
    <section class="bg-gradient-to-br from-slate-950 via-slate-900 to-blue-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 md:py-16">
            <div class="grid gap-10 xl:grid-cols-[minmax(0,1fr)_360px]">
                <div>
                    <div class="mb-4 flex flex-wrap gap-2">
                        <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-semibold text-blue-100">
                            {{ $kurs->kategoria?->nazwa }}
                        </span>
                        <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-semibold text-slate-200">
                            {{ $kurs->poziom?->nazwa }}
                        </span>

                        @auth
                            @if($czyZapisany)
                                <span class="inline-flex items-center rounded-full bg-green-500/20 px-3 py-1 text-xs font-semibold text-green-200">
                                    Jesteś zapisany
                                </span>
                            @endif
                        @endauth
                    </div>

                    <h1 class="text-4xl md:text-5xl font-bold tracking-tight leading-tight">
                        {{ $kurs->tytul }}
                    </h1>

                    @if($kurs->podtytul)
                        <p class="mt-4 text-xl text-slate-300">
                            {{ $kurs->podtytul }}
                        </p>
                    @endif

                    <p class="mt-6 max-w-3xl text-lg leading-8 text-slate-300">
                        {{ $kurs->opis_krotki }}
                    </p>

                    <div class="mt-8 flex flex-wrap gap-6 text-sm text-slate-300">
                        <span>Czas trwania: {{ $kurs->czas_trwania_minuty }} min</span>
                        <span>Liczba lekcji: {{ $kurs->liczba_lekcji }}</span>
                        <span>Język: {{ $kurs->jezyk }}</span>
                    </div>
                </div>

                <aside class="rounded-3xl bg-white p-6 text-slate-900 shadow-xl">
                    @if(session('success'))
                        <div class="mb-4 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="rounded-2xl bg-blue-50 p-5">
                        <div class="text-sm text-slate-500">Cena kursu</div>
                        <div class="mt-2 text-3xl font-bold text-slate-900">
                            @if($kurs->czy_darmowy)
                                Darmowy
                            @elseif($kurs->cena_promocyjna)
                                {{ number_format($kurs->cena_promocyjna, 2, ',', ' ') }} zł
                            @else
                                {{ number_format($kurs->cena, 2, ',', ' ') }} zł
                            @endif
                        </div>
                    </div>

                    <div class="mt-5 space-y-3">
                        @auth
                            @if($czyZapisany)
                                <div class="w-full rounded-xl border border-green-200 bg-green-50 px-5 py-3 text-center text-sm font-semibold text-green-800">
                                    Jesteś już zapisany na ten kurs
                                </div>

                                <a href="{{ route('panel.index') }}" class="block w-full rounded-xl bg-blue-600 px-5 py-3 text-center text-sm font-semibold text-white hover:bg-blue-700 transition">
                                    Przejdź do panelu
                                </a>
                            @else
                                <form method="POST" action="{{ route('kursy.zapisz', $kurs->slug) }}">
                                    @csrf
                                    <button type="submit" class="w-full rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white hover:bg-blue-700 transition">
                                        Zapisz się na kurs
                                    </button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="block w-full rounded-xl bg-blue-600 px-5 py-3 text-center text-sm font-semibold text-white hover:bg-blue-700 transition">
                                Zaloguj się, aby się zapisać
                            </a>
                        @endauth

                        <button class="w-full rounded-xl border border-blue-200 px-5 py-3 text-sm font-semibold text-blue-700 hover:bg-blue-50 transition">
                            Dodaj do listy
                        </button>
                    </div>

                    <div class="mt-6 border-t border-slate-200 pt-5 space-y-3 text-sm text-slate-600">
                        <div>Pełny dostęp online</div>
                        <div>Nauka we własnym tempie</div>
                        <div>Materiały i lekcje w jednym miejscu</div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4 pb-10">
        <div class="grid gap-8 xl:grid-cols-[minmax(0,1fr)_320px]">
            <div class="space-y-8">
                <div class="overflow-hidden rounded-2xl border border-blue-100 bg-white shadow-sm">
                    <div class="bg-gradient-to-br from-blue-600 via-blue-500 to-blue-700 text-white p-5">
                        <h2 class="text-lg font-bold">Opis kursu</h2>
                    </div>

                    <div class="p-6">
                        @if($kurs->opis_pelny)
                            <p class="text-slate-700 leading-8">{{ $kurs->opis_pelny }}</p>
                        @endif

                        @if($kurs->dla_kogo)
                            <h3 class="mt-8 text-xl font-semibold text-slate-900">Dla kogo</h3>
                            <p class="mt-3 text-slate-700 leading-8">{{ $kurs->dla_kogo }}</p>
                        @endif

                        @if($kurs->czego_sie_nauczysz)
                            <h3 class="mt-8 text-xl font-semibold text-slate-900">Czego się nauczysz</h3>
                            <p class="mt-3 text-slate-700 leading-8">{{ $kurs->czego_sie_nauczysz }}</p>
                        @endif

                        @if($kurs->wymagania_wstepne)
                            <h3 class="mt-8 text-xl font-semibold text-slate-900">Wymagania wstępne</h3>
                            <p class="mt-3 text-slate-700 leading-8">{{ $kurs->wymagania_wstepne }}</p>
                        @endif
                    </div>
                </div>

                <div class="overflow-hidden rounded-2xl border border-blue-100 bg-white shadow-sm">
                    <div class="bg-gradient-to-br from-blue-600 via-blue-500 to-blue-700 text-white p-5">
                        <h2 class="text-lg font-bold">Program kursu</h2>
                    </div>

                    <div class="p-6">
                        <div class="space-y-5">
                            @forelse($kurs->sekcje as $sekcja)
                                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                                    <h3 class="text-lg font-semibold text-slate-900">{{ $sekcja->tytul }}</h3>

                                    @if($sekcja->opis)
                                        <p class="mt-2 text-sm text-slate-600">{{ $sekcja->opis }}</p>
                                    @endif

                                    <div class="mt-4 space-y-2">
                                        @foreach($sekcja->lekcje as $lekcja)
                                            <div class="flex items-center justify-between rounded-xl border border-slate-200 bg-white px-4 py-3">
                                                <span class="text-sm font-medium text-slate-800">{{ $lekcja->tytul }}</span>
                                                <span class="text-xs text-slate-500">{{ $lekcja->czas_trwania_minuty ?? 0 }} min</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @empty
                                <p class="text-slate-600">Program kursu zostanie wkrótce uzupełniony.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="overflow-hidden rounded-2xl border border-blue-100 bg-white shadow-sm">
                    <div class="bg-gradient-to-br from-blue-600 via-blue-500 to-blue-700 text-white p-5">
                        <h3 class="text-lg font-bold">Prowadzący</h3>
                    </div>

                    <div class="p-6">
                        <div class="flex items-start gap-4">
                            <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-blue-100 to-slate-200"></div>
                            <div>
                                <div class="font-semibold text-slate-900">{{ $kurs->prowadzacy?->user?->name }}</div>
                                @if($kurs->prowadzacy?->specjalizacja)
                                    <div class="mt-1 text-sm text-slate-600">{{ $kurs->prowadzacy->specjalizacja }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="overflow-hidden rounded-2xl border border-blue-100 bg-white shadow-sm">
                    <div class="bg-gradient-to-br from-blue-600 via-blue-500 to-blue-700 text-white p-5">
                        <h3 class="text-lg font-bold">Tagi</h3>
                    </div>

                    <div class="p-6">
                        <div class="flex flex-wrap gap-2">
                            @forelse($kurs->tagi as $tag)
                                <span class="inline-flex items-center rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-700">
                                    {{ $tag->nazwa }}
                                </span>
                            @empty
                                <span class="text-sm text-slate-500">Brak tagów.</span>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl bg-gradient-to-br from-blue-700 via-blue-600 to-slate-900 p-6 text-white shadow-lg">
                    <h3 class="text-xl font-semibold">Gotowy na naukę?</h3>
                    <p class="mt-3 text-blue-100 leading-7">
                        Zdobądź dostęp do materiałów i rozpocznij naukę we własnym tempie.
                    </p>
                    <button class="mt-5 inline-flex items-center rounded-xl border border-white/20 bg-white/10 px-5 py-3 text-sm font-semibold text-white hover:bg-white/15 transition">
                        Rozpocznij teraz
                    </button>
                </div>
            </div>
        </div>
    </section>

    @if($podobneKursy->count())
        <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pb-10">
            <div class="mb-6">
                <h2 class="text-2xl font-bold tracking-tight text-slate-900">Podobne kursy</h2>
                <p class="mt-2 text-slate-600 leading-7">Sprawdź także inne kursy z tej samej kategorii.</p>
            </div>

            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-2">
                @foreach($podobneKursy as $podobny)
                    <article class="overflow-hidden rounded-2xl border border-blue-100 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-blue-100/50 max-w-md mx-auto w-full">
                        <div class="bg-gradient-to-br from-blue-600 via-blue-500 to-blue-700 text-white p-5">
                            <div class="mb-2 text-xs text-blue-100">
                                {{ $podobny->kategoria?->nazwa }}
                            </div>

                            <h3 class="text-lg font-bold leading-6">
                                {{ $podobny->tytul }}
                            </h3>
                        </div>

                        <div class="p-5">
                            <p class="text-sm leading-7 text-slate-600">
                                {{ $podobny->opis_krotki }}
                            </p>

                            <a href="{{ route('kursy.show', $podobny->slug) }}" class="mt-5 inline-flex text-blue-600 font-semibold hover:underline">
                                Zobacz kurs
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    @endif
@endsection
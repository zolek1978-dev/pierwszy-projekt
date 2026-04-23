@extends('layouts.app')

@section('content')
@if(session('success'))
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6">
        <div class="rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-green-800">
            {{ session('success') }}
        </div>
    </section>
@endif
    <section class="bg-gradient-to-br from-slate-950 via-slate-900 to-blue-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="grid lg:grid-cols-2 gap-14 items-center">
                <div>
                    <span class="inline-flex items-center rounded-full bg-white/10 px-4 py-2 text-sm font-medium text-blue-100 mb-6">
                        Nowoczesna platforma edukacyjna
                    </span>

                    <h1 class="text-5xl md:text-6xl font-bold tracking-tight leading-tight">
                        Nauka, która daje realne umiejętności.
                    </h1>

                    <p class="mt-6 text-lg text-slate-300 leading-8 max-w-2xl">
                        Kursiki to miejsce, w którym praktyczne podejście spotyka nowoczesne technologie. Ucz się programowania, web developmentu, baz danych i AI w uporządkowany sposób.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="{{ route('kursy.index') }}" class="inline-flex items-center rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white hover:bg-blue-700 transition">
                            Przeglądaj kursy
                        </a>
                        <a href="{{ route('blog.index') }}" class="inline-flex items-center rounded-xl border border-white/20 bg-white/5 px-6 py-3 text-sm font-semibold text-white hover:bg-white/10 transition">
                            Zobacz blog
                        </a>
                    </div>

                    <div class="mt-12 grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                            <div class="text-2xl font-bold">{{ $kategorie->count() }}</div>
                            <div class="mt-1 text-sm text-slate-300">Kategorie</div>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                            <div class="text-2xl font-bold">{{ $wyroznioneKursy->count() }}</div>
                            <div class="mt-1 text-sm text-slate-300">Wyróżnione</div>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                            <div class="text-2xl font-bold">24/7</div>
                            <div class="mt-1 text-sm text-slate-300">Dostęp</div>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-5">
                            <div class="text-2xl font-bold">PRO</div>
                            <div class="mt-1 text-sm text-slate-300">Podejście</div>
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl border border-white/10 bg-white/5 p-8 shadow-2xl">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="rounded-2xl bg-white/10 p-5">
                            <div class="text-3xl font-bold">PHP</div>
                            <div class="mt-2 text-sm text-slate-300">Backend i aplikacje webowe</div>
                        </div>
                        <div class="rounded-2xl bg-white/10 p-5">
                            <div class="text-3xl font-bold">SQL</div>
                            <div class="mt-2 text-sm text-slate-300">Bazy danych i analityka</div>
                        </div>
                        <div class="rounded-2xl bg-white/10 p-5">
                            <div class="text-3xl font-bold">AI</div>
                            <div class="mt-2 text-sm text-slate-300">Nowoczesne narzędzia pracy</div>
                        </div>
                        <div class="rounded-2xl bg-white/10 p-5">
                            <div class="text-3xl font-bold">Web</div>
                            <div class="mt-2 text-sm text-slate-300">Frontend i full stack</div>
                        </div>
                    </div>

                    <div class="mt-6 rounded-2xl bg-gradient-to-r from-blue-600/30 to-blue-400/10 p-6">
                        <h3 class="text-xl font-semibold">Praktyka ponad teorię</h3>
                        <p class="mt-3 text-sm leading-7 text-slate-300">
                            Kursy projektowane tak, aby prowadzić od podstaw do konkretnych rezultatów i realnych umiejętności.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="mb-8">
            <h2 class="text-3xl font-bold tracking-tight text-slate-900">Kategorie kursów</h2>
            <p class="mt-2 text-slate-600 leading-7">Wybierz obszar, który chcesz rozwijać i przejdź do praktycznej nauki.</p>
        </div>

        <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-5">
            @foreach($kategorie as $kategoria)
                <div class="rounded-3xl border border-blue-100 bg-white p-6 shadow-sm hover:shadow-md transition">
                    <div class="mb-5 flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-50 text-lg font-bold text-blue-700">
                        {{ mb_substr($kategoria->nazwa, 0, 1) }}
                    </div>
                    <h3 class="text-lg font-semibold text-slate-900">{{ $kategoria->nazwa }}</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">{{ $kategoria->opis_krotki }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="mb-8 flex items-end justify-between gap-6">
            <div>
                <h2 class="text-3xl font-bold tracking-tight text-slate-900">Wyróżnione kursy</h2>
                <p class="mt-2 text-slate-600 leading-7">Najciekawsze propozycje przygotowane dla użytkowników platformy.</p>
            </div>
            <a href="{{ route('kursy.index') }}" class="hidden md:inline-flex text-blue-600 font-semibold hover:underline">
                Zobacz wszystkie
            </a>
        </div>

        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @foreach($wyroznioneKursy as $kurs)
                <article class="overflow-hidden rounded-3xl border border-blue-100 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <div class="h-48 bg-gradient-to-br from-blue-100 via-white to-slate-100"></div>

                    <div class="p-6">
                        <div class="mb-3 flex flex-wrap gap-2">
                            <span class="inline-flex items-center rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-700">
                                {{ $kurs->kategoria?->nazwa }}
                            </span>
                            <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">
                                {{ $kurs->poziom?->nazwa }}
                            </span>
                        </div>

                        <h3 class="text-xl font-semibold leading-8 text-slate-900">{{ $kurs->tytul }}</h3>

                        <p class="mt-3 text-sm leading-7 text-slate-600">
                            {{ $kurs->opis_krotki }}
                        </p>

                        <div class="mt-6 flex items-center justify-between border-t border-slate-200 pt-5">
                            <div class="text-lg font-bold text-slate-900">
                                @if($kurs->czy_darmowy)
                                    Darmowy
                                @elseif($kurs->cena_promocyjna)
                                    {{ number_format($kurs->cena_promocyjna, 2, ',', ' ') }} zł
                                @else
                                    {{ number_format($kurs->cena, 2, ',', ' ') }} zł
                                @endif
                            </div>

                            <a href="{{ route('kursy.show', $kurs->slug) }}" class="text-blue-600 font-semibold hover:underline">
                                Szczegóły
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="overflow-hidden rounded-3xl border border-blue-100 bg-white shadow-sm">
            <div class="grid lg:grid-cols-2 gap-0 items-center">
                <div class="p-8 md:p-12">
                    <h2 class="text-3xl font-bold tracking-tight text-slate-900">Dlaczego warto uczyć się z Kursiki?</h2>
                    <p class="mt-4 text-slate-600 leading-8">
                        Kursy są projektowane tak, aby łączyć uporządkowaną teorię z praktyką, zadaniami i podejściem nastawionym na realne zastosowania.
                    </p>

                    <div class="mt-8 space-y-5">
                        <div class="flex gap-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-100 font-bold text-blue-700">1</div>
                            <div>
                                <h3 class="font-semibold text-slate-900">Praktyczne podejście</h3>
                                <p class="mt-1 text-sm text-slate-600">Skupienie na realnych umiejętnościach, projektach i użytecznej wiedzy.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-100 font-bold text-blue-700">2</div>
                            <div>
                                <h3 class="font-semibold text-slate-900">Nowoczesne technologie</h3>
                                <p class="mt-1 text-sm text-slate-600">Laravel, PHP, SQL, AI, web development i inne aktualne obszary IT.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-100 font-bold text-blue-700">3</div>
                            <div>
                                <h3 class="font-semibold text-slate-900">Wygodna nauka online</h3>
                                <p class="mt-1 text-sm text-slate-600">Dostęp do kursów z dowolnego miejsca i możliwość nauki we własnym tempie.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="h-full min-h-[320px] bg-gradient-to-br from-blue-700 via-blue-600 to-slate-900"></div>
            </div>
        </div>
    </section>
@endsection
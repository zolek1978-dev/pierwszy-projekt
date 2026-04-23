@extends('layouts.app')

@section('content')
    <section class="bg-gradient-to-br from-slate-950 via-slate-900 to-blue-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 md:py-16">
            <div class="max-w-3xl">
                <span class="inline-flex items-center rounded-full bg-white/10 px-4 py-2 text-sm font-medium text-blue-100 mb-4">
                    Katalog kursów
                </span>

                <h1 class="text-4xl md:text-5xl font-bold tracking-tight leading-tight">
                    Kursy
                </h1>

                <p class="mt-4 text-lg text-slate-300 leading-8">
                    Przeglądaj kursy, filtruj według poziomu i kategorii oraz wybieraj ścieżkę nauki dopasowaną do swoich celów.
                </p>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-10">
        <div class="rounded-3xl border border-blue-100 bg-white p-5 md:p-6 shadow-lg shadow-blue-100/40">
            <form method="GET" action="{{ route('kursy.index') }}" class="grid gap-4 md:grid-cols-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Szukaj</label>
                    <input
                        type="text"
                        name="szukaj"
                        value="{{ request('szukaj') }}"
                        placeholder="Nazwa kursu..."
                        class="w-full rounded-xl border border-blue-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none"
                    >
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Kategoria</label>
                    <select name="kategoria" class="w-full rounded-xl border border-blue-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none">
                        <option value="">Wszystkie kategorie</option>
                        @foreach($kategorie as $kategoria)
                            <option value="{{ $kategoria->slug }}" @selected(request('kategoria') === $kategoria->slug)>
                                {{ $kategoria->nazwa }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Poziom</label>
                    <select name="poziom" class="w-full rounded-xl border border-blue-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none">
                        <option value="">Wszystkie poziomy</option>
                        @foreach($poziomy as $poziom)
                            <option value="{{ $poziom->slug }}" @selected(request('poziom') === $poziom->slug)>
                                {{ $poziom->nazwa }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-end gap-3">
                    <button type="submit" class="flex-1 rounded-xl bg-blue-600 px-4 py-3 text-sm font-semibold text-white hover:bg-blue-700 transition">
                        Filtruj
                    </button>

                    <a href="{{ route('kursy.index') }}" class="rounded-xl border border-blue-200 px-4 py-3 text-sm font-semibold text-blue-700 hover:bg-blue-50 transition">
                        Reset
                    </a>
                </div>
            </form>
        </div>
    </section>

    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pt-4 pb-10">
        <div class="mb-3 text-sm text-slate-500">
            Wyników: <span class="font-semibold text-slate-900">{{ $kursy->total() }}</span>
        </div>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-2">
            @forelse($kursy as $kurs)
                <article class="overflow-hidden rounded-2xl border border-blue-100 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-blue-100/50 max-w-md mx-auto w-full">
                    <div class="bg-gradient-to-br from-blue-600 via-blue-500 to-blue-700 text-white p-5">
                        <div class="flex flex-wrap gap-2 mb-3">
                            <span class="inline-flex items-center rounded-full bg-white/20 px-3 py-1 text-xs font-semibold">
                                {{ $kurs->kategoria?->nazwa }}
                            </span>
                            <span class="inline-flex items-center rounded-full bg-white/20 px-3 py-1 text-xs font-semibold">
                                {{ $kurs->poziom?->nazwa }}
                            </span>
                        </div>

                        <h2 class="text-lg font-bold leading-6">
                            {{ $kurs->tytul }}
                        </h2>
                    </div>

                    <div class="p-5">
                        <p class="text-sm leading-7 text-slate-600">
                            {{ $kurs->opis_krotki }}
                        </p>

                        <div class="mt-5 flex flex-wrap gap-4 text-xs text-slate-500">
                            <span>{{ $kurs->czas_trwania_minuty }} min</span>
                            <span>{{ $kurs->liczba_lekcji }} lekcji</span>
                            <span>{{ $kurs->jezyk }}</span>
                        </div>

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
            @empty
                <div class="rounded-3xl border border-blue-100 bg-white p-8 text-slate-600 shadow-sm sm:col-span-2">
                    Brak kursów spełniających podane kryteria.
                </div>
            @endforelse
        </div>

        <div class="mt-10">
            {{ $kursy->links() }}
        </div>
    </section>
@endsection
@extends('layouts.app')

@section('content')
    <section class="bg-gradient-to-br from-slate-950 via-slate-900 to-blue-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 md:py-16">
            <div class="max-w-3xl">
                <span class="inline-flex items-center rounded-full bg-white/10 px-4 py-2 text-sm font-medium text-blue-100 mb-4">
                    Panel użytkownika
                </span>

                <h1 class="text-4xl md:text-5xl font-bold tracking-tight leading-tight">
                    Witaj, {{ $profil->imie ?? $user->name }}
                </h1>

                <p class="mt-4 text-lg text-slate-300 leading-8">
                    To jest Twoja strefa użytkownika. Tutaj znajdziesz swoje kursy, role i podstawowe informacje o koncie.
                </p>
            </div>
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-4 pb-10">
        <div class="grid gap-8 xl:grid-cols-[minmax(0,1fr)_320px]">
            <div class="space-y-8">
                <div class="overflow-hidden rounded-2xl border border-blue-100 bg-white shadow-sm">
                    <div class="bg-gradient-to-br from-blue-600 via-blue-500 to-blue-700 text-white p-5">
                        <h2 class="text-lg font-bold">Podstawowe informacje</h2>
                    </div>

                    <div class="p-6">
                        <div class="grid gap-5 md:grid-cols-2">
                            <div>
                                <div class="text-sm font-medium text-slate-500">Imię</div>
                                <div class="mt-1 text-base text-slate-900">{{ $profil->imie ?? '-' }}</div>
                            </div>

                            <div>
                                <div class="text-sm font-medium text-slate-500">Nazwisko</div>
                                <div class="mt-1 text-base text-slate-900">{{ $profil->nazwisko ?? '-' }}</div>
                            </div>

                            <div>
                                <div class="text-sm font-medium text-slate-500">E-mail</div>
                                <div class="mt-1 text-base text-slate-900">{{ $user->email }}</div>
                            </div>

                            <div>
                                <div class="text-sm font-medium text-slate-500">Telefon</div>
                                <div class="mt-1 text-base text-slate-900">{{ $profil->telefon ?? '-' }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="overflow-hidden rounded-2xl border border-blue-100 bg-white shadow-sm">
                    <div class="bg-gradient-to-br from-blue-600 via-blue-500 to-blue-700 text-white p-5">
                        <h2 class="text-lg font-bold">Moje kursy</h2>
                    </div>

                    <div class="p-6">
                        @if($mojeKursy->count())
                            <div class="grid gap-6 md:grid-cols-2">
                                @foreach($mojeKursy as $kurs)
                                    <article class="overflow-hidden rounded-2xl border border-blue-100 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-blue-100/50">
                                        <div class="bg-gradient-to-br from-blue-600 via-blue-500 to-blue-700 text-white p-5">
                                            <div class="flex flex-wrap gap-2 mb-3">
                                                @if($kurs->kategoria_nazwa)
                                                    <span class="inline-flex items-center rounded-full bg-white/20 px-3 py-1 text-xs font-semibold">
                                                        {{ $kurs->kategoria_nazwa }}
                                                    </span>
                                                @endif

                                                @if($kurs->poziom_nazwa)
                                                    <span class="inline-flex items-center rounded-full bg-white/20 px-3 py-1 text-xs font-semibold">
                                                        {{ $kurs->poziom_nazwa }}
                                                    </span>
                                                @endif
                                            </div>

                                            <h3 class="text-lg font-bold leading-6">
                                                {{ $kurs->tytul }}
                                            </h3>
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

                                            <div class="mt-5 rounded-xl bg-slate-50 p-4 text-sm text-slate-700 space-y-1">
                                                <div><strong>Status zapisu:</strong> {{ $kurs->status }}</div>
                                                <div><strong>Data zapisu:</strong> {{ \Carbon\Carbon::parse($kurs->data_zapisu)->format('d.m.Y H:i') }}</div>
                                            </div>

                                            <div class="mt-5">
                                                <a href="{{ route('kursy.show', $kurs->slug) }}" class="inline-flex text-blue-600 font-semibold hover:underline">
                                                    Przejdź do kursu
                                                </a>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        @else
                            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                                <h3 class="text-lg font-semibold text-slate-900">Nie masz jeszcze żadnych kursów</h3>
                                <p class="mt-2 text-slate-600 leading-7">
                                    Gdy zapiszesz się na kurs, pojawi się on właśnie tutaj.
                                </p>
                                <a href="{{ route('kursy.index') }}" class="mt-4 inline-flex text-blue-600 font-semibold hover:underline">
                                    Przejdź do katalogu kursów
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="overflow-hidden rounded-2xl border border-blue-100 bg-white shadow-sm">
                    <div class="bg-gradient-to-br from-blue-600 via-blue-500 to-blue-700 text-white p-5">
                        <h2 class="text-lg font-bold">Role użytkownika</h2>
                    </div>

                    <div class="p-6">
                        <div class="flex flex-wrap gap-2">
                            @forelse($role as $rola)
                                <span class="inline-flex items-center rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-700">
                                    {{ $rola->nazwa }}
                                </span>
                            @empty
                                <span class="text-sm text-slate-500">Brak przypisanej roli.</span>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl bg-gradient-to-br from-blue-700 via-blue-600 to-slate-900 p-6 text-white shadow-lg">
                    <h2 class="text-xl font-semibold">Co dalej?</h2>
                    <p class="mt-3 text-blue-100 leading-7">
                        Następnie możemy dodać prawdziwe postępy kursów, historię zamówień i edycję profilu użytkownika.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
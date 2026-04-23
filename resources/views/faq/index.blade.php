@extends('layouts.app')

@section('content')
    <section class="bg-gradient-to-br from-slate-950 via-slate-900 to-blue-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 md:py-16">
            <div class="max-w-3xl">
                <span class="inline-flex items-center rounded-full bg-white/10 px-4 py-2 text-sm font-medium text-blue-100 mb-4">
                    FAQ
                </span>

                <h1 class="text-4xl md:text-5xl font-bold tracking-tight leading-tight">
                    FAQ
                </h1>

                <p class="mt-4 text-lg text-slate-300 leading-8">
                    Najczęściej zadawane pytania dotyczące kursów, płatności, konta i działania platformy.
                </p>
            </div>
        </div>
    </section>

    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pt-4 pb-10">
        <div class="space-y-6">
            @forelse($kategorieFaq as $kategoria)
                <section class="overflow-hidden rounded-2xl border border-blue-100 bg-white shadow-sm">

                    {{-- NIEBIESKI HEADER (jak w kartach kursów) --}}
                    <div class="bg-gradient-to-br from-blue-600 via-blue-500 to-blue-700 text-white p-5">
                        <h2 class="text-lg font-bold">
                            {{ $kategoria->nazwa }}
                        </h2>
                    </div>

                    {{-- TREŚĆ --}}
                    <div class="p-5 space-y-4">
                        @forelse($kategoria->pytania as $pytanie)
                            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                                <h3 class="text-sm font-semibold text-slate-900">
                                    {{ $pytanie->pytanie }}
                                </h3>

                                <p class="mt-2 text-sm text-slate-600 leading-7">
                                    {{ $pytanie->odpowiedz }}
                                </p>
                            </div>
                        @empty
                            <p class="text-sm text-slate-500">
                                Brak pytań w tej kategorii.
                            </p>
                        @endforelse
                    </div>

                </section>
            @empty
                <div class="rounded-3xl border border-blue-100 bg-white p-8 text-slate-600 shadow-sm">
                    Brak kategorii FAQ do wyświetlenia.
                </div>
            @endforelse
        </div>
    </section>
@endsection
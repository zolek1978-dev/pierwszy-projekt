@extends('layouts.app')

@section('content')
    <section class="bg-gradient-to-br from-slate-950 via-slate-900 to-blue-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 md:py-16">
            <div class="max-w-4xl">
                <div class="mb-3 text-sm text-blue-100">
                    {{ $wpis->kategoria?->nazwa }} • {{ optional($wpis->data_publikacji)->format('d.m.Y') }}
                </div>

                <h1 class="text-4xl md:text-5xl font-bold tracking-tight leading-tight">
                    {{ $wpis->tytul }}
                </h1>

                @if($wpis->zajawka)
                    <p class="mt-4 text-lg text-slate-300 leading-8">
                        {{ $wpis->zajawka }}
                    </p>
                @endif

                <div class="mt-5 flex flex-wrap gap-2">
                    @foreach($wpis->tagi as $tag)
                        <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-semibold text-blue-100">
                            {{ $tag->nazwa }}
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pt-4 pb-10">
        <article class="overflow-hidden rounded-2xl border border-blue-100 bg-white shadow-sm">
            <div class="bg-gradient-to-br from-blue-600 via-blue-500 to-blue-700 text-white p-5">
                <h2 class="text-lg font-bold">
                    {{ $wpis->tytul }}
                </h2>
            </div>

            <div class="p-6 prose-custom">
                {!! $wpis->tresc !!}
            </div>
        </article>
    </section>

    @if($podobneWpisy->count())
        <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pb-10">
            <div class="mb-6">
                <h2 class="text-2xl font-bold tracking-tight text-slate-900">Podobne wpisy</h2>
                <p class="mt-2 text-slate-600 leading-7">Sprawdź również inne artykuły z tej kategorii.</p>
            </div>

            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-2">
                @foreach($podobneWpisy as $podobny)
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
                            <a href="{{ route('blog.show', $podobny->slug) }}" class="inline-flex text-blue-600 font-semibold hover:underline">
                                Czytaj dalej
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    @endif
@endsection
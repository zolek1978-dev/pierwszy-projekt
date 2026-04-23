@extends('layouts.app')

@section('content')
    <section class="bg-gradient-to-br from-slate-950 via-slate-900 to-blue-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 md:py-16">
            <div class="max-w-4xl">
                <span class="inline-flex items-center rounded-full bg-white/10 px-4 py-2 text-sm font-medium text-blue-100 mb-4">
                    Informacje
                </span>

                <h1 class="text-4xl md:text-5xl font-bold tracking-tight leading-tight">
                    {{ $strona->tytul }}
                </h1>
            </div>
        </div>
    </section>

    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pt-4 pb-10">
        <article class="overflow-hidden rounded-2xl border border-blue-100 bg-white shadow-sm">
            <div class="bg-gradient-to-br from-blue-600 via-blue-500 to-blue-700 text-white p-5">
                <h2 class="text-lg font-bold">
                    {{ $strona->tytul }}
                </h2>
            </div>

            <div class="p-6 prose-custom">
                {!! $strona->tresc !!}
            </div>
        </article>
    </section>
@endsection
@extends('layouts.app')

@section('content')
    <section class="bg-gradient-to-br from-slate-950 via-slate-900 to-blue-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 md:py-16">
            <div class="max-w-3xl">
                <span class="inline-flex items-center rounded-full bg-white/10 px-4 py-2 text-sm font-medium text-blue-100 mb-4">
                    Blog
                </span>

                <h1 class="text-4xl md:text-5xl font-bold tracking-tight leading-tight">
                    Blog
                </h1>

                <p class="mt-4 text-lg text-slate-300 leading-8">
                    Poradniki, artykuły i materiały wspierające naukę technologii oraz rozwój kompetencji cyfrowych.
                </p>
            </div>
        </div>
    </section>

    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pt-4 pb-10">
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-2">
            @forelse($wpisy as $wpis)
                <article class="overflow-hidden rounded-2xl border border-blue-100 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-blue-100/50 max-w-md mx-auto w-full">
                    <div class="bg-gradient-to-br from-blue-600 via-blue-500 to-blue-700 text-white p-5">
                        <div class="mb-3 text-sm text-blue-100">
                            {{ $wpis->kategoria?->nazwa }} • {{ optional($wpis->data_publikacji)->format('d.m.Y') }}
                        </div>

                        <h2 class="text-lg font-bold leading-6">
                            {{ $wpis->tytul }}
                        </h2>
                    </div>

                    <div class="p-5">
                        <p class="text-sm leading-7 text-slate-600">
                            {{ $wpis->zajawka }}
                        </p>

                        <a href="{{ route('blog.show', $wpis->slug) }}" class="mt-5 inline-flex text-blue-600 font-semibold hover:underline">
                            Czytaj dalej
                        </a>
                    </div>
                </article>
            @empty
                <div class="rounded-3xl border border-blue-100 bg-white p-8 text-slate-600 shadow-sm sm:col-span-2">
                    Brak opublikowanych wpisów.
                </div>
            @endforelse
        </div>

        <div class="mt-10">
            {{ $wpisy->links() }}
        </div>
    </section>
@endsection